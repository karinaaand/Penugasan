<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Transaction\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $histories = Transaction::where('variant', 'Checkout')->paginate(30);
        $now = Carbon::now();
        $jatuhTempo = DB::table('bills')
            ->join('transactions', 'bills.transaction_id', '=', 'transactions.id')
            ->join('vendors', 'transactions.vendor_id', '=', 'vendors.id')
            ->select('bills.id', 'vendors.name as vendor_name', 'bills.due')
            ->where('bills.status', 'Belum Bayar')
            ->orderBy('bills.due', 'asc') 
            ->get();

        $gudangMenipis = DB::table('warehouse_inventory')
            ->join('drugs', 'warehouse_inventory.drug_id', '=', 'drugs.id')
            ->whereColumn('warehouse_inventory.quantity', '<=', 'drugs.minimum_capacity')
            ->select('warehouse_inventory.id', 'drugs.name as drug_name', 'warehouse_inventory.quantity', DB::raw('"Gudang" as location'))
            ->orderBy('warehouse_inventory.quantity', 'asc')
            ->get();

        $klinikMenipis = DB::table('clinic_inventory')
            ->join('drugs', 'clinic_inventory.drug_id', '=', 'drugs.id')
            ->whereColumn('clinic_inventory.quantity', '<=', 'drugs.minimum_capacity')
            ->select('clinic_inventory.id', 'drugs.name as drug_name', 'clinic_inventory.quantity', DB::raw('"Klinik" as location'))
            ->orderBy('clinic_inventory.quantity', 'asc')
            ->get();

        $stokMenipis = $gudangMenipis->merge($klinikMenipis);

        $expired = DB::table('transaction_details')
            ->join('drugs', 'transaction_details.drug_id', '=', 'drugs.id')
            ->where('transaction_details.expired', '<=', now()->addDays(30))
            ->select('drugs.name as drug_name', 'transaction_details.expired')
            ->groupBy('drugs.name', 'transaction_details.expired') 
            ->orderBy('transaction_details.expired', 'asc')
            ->get();

        $notifications = $jatuhTempo->merge($stokMenipis)->merge($expired);

    return view('pages.dashboard', compact('histories', 'notifications'));
}

    public function penjualan() {

        $startDate = Carbon::now()->startOfWeek();
        $endDate = $startDate->copy()->addDays(6)->endOfDay();

        $transactions = DB::table('transactions')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(CASE 
                            WHEN variant = "LPB" THEN outcome
                            WHEN variant = "LPK" THEN (SELECT SUM(total_price) FROM transaction_details WHERE transaction_id = transactions.id)
                            WHEN variant = "Checkout" THEN income
                            WHEN variant = "Trash" THEN -loss
                            ELSE 0 
                        END) as total_profit')
        )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->keyBy('date'); 

        $labels = [];
        $dataset = [];
        $highestProfit = 0;
        $highestDay = '';

        $shortDays = ['S', 'S', 'R', 'K', 'J', 'S', 'M'];

        for ($i = 0; $i < 7; $i++) {
            $currentDate = $startDate->copy()->addDays($i);
            $formattedDate = $currentDate->toDateString();

            $totalProfit = $transactions->has($formattedDate) ? $transactions[$formattedDate]->total_profit : 0;

            $labels[] = $shortDays[$i];
            $dataset[] = $totalProfit;

            if ($totalProfit > $highestProfit) {
                $highestProfit = $totalProfit;
                $highestDay = $currentDate->isoFormat('dddd');
        }
    }

    return response()->json([
        'labels' => $labels,
        'dataset' => $dataset,
        'highestDay' => $highestDay,
    ]);
}

    public function obat() {

        $transactions = DB::table('transaction_details')
            ->select(
                'drugs.name as drug_name', 
                DB::raw('SUM(CASE 
                            WHEN transactions.variant = "Checkout" 
                            THEN transaction_details.quantity 
                            ELSE 0 
                        END) as total_sold')
            )
            ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->join('repacks', 'transaction_details.name', '=', 'repacks.name')
            ->join('drugs', 'repacks.drug_id', '=', 'drugs.id')
            ->groupBy('drugs.id', 'drugs.name')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();

    return response()->json([
        'labels' => $transactions->pluck('drug_name'),
        'dataset' => $transactions->pluck('total_sold')
        ]);
    }
}
