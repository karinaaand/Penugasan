<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Clinic;
use App\Models\Inventory\Warehouse;
use App\Models\Master\Drug;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;
use Illuminate\Http\Request;

class ClinicFlowController extends Controller
{
    public function index()
    {
        $judul = "Barang Masuk";
        $transactions = Transaction::where('variant','LPK')->paginate(5);
        return view("pages.clinic.inflow",compact('judul','transactions'));
    }
    public function create()
    {
        return view('pages.clinic.addStuff');
    }
    public function store(Request $request)
    {
        $datas = json_decode($request->transaction);
        $transaction = Transaction::create([
            "destination"=>"clinic",
            "variant"=>"LPK",
        ]);
        $transaction->generate_code();
        foreach ($datas as $item) {
            $drugAdd = Drug::where('name',$item->name)->first();
            $quantity = $drugAdd->piece_netto*$item->quantity;
            $warehouse = Warehouse::where('drug_id',$drugAdd->id)->first();
            $warehouse->quantity = $warehouse->quantity - $quantity;
            $warehouse->save();
            $clinic = Clinic::where('drug_id',$drugAdd->id)->first();
            $clinic->quantity = $clinic->quantity + $quantity;
            if ($clinic->oldest == null) {
                $clinic->oldest = $warehouse->oldest;
                $clinic->latest = $warehouse->oldest;
            }else{
                if ($clinic->oldest > $warehouse->oldest) {
                    $clinic->oldest = $warehouse->oldest;
                }
                if ($clinic->latest < $warehouse->latest) {
                    $clinic->latest = $warehouse->latest;  
                }
            }
            $clinic->save();
            $require = $quantity;
            $remain = $require;
            $used = $drugAdd->used();
            if($used->stock > $require){
                $used->stock = $used->stock - $require;
                $used->save();
                TransactionDetail::create([
                    "transaction_id"=>$transaction->id,
                    "drug_id"=>$drugAdd->id,
                    "name"=>$drugAdd->name." 1 pcs",
                    "quantity"=>$item->quantity." pcs",
                    "stock"=>$quantity,
                    "expired"=>$used->expired,
                    "piece_price"=>$drugAdd->last_price,
                    "total_price"=>$drugAdd->last_price*$item->quantity,                
                ]);
            }else{
                while ($remain > 0) {
                    $expired = $used->expired;
                    if ($used->stock > $remain) {
                        $used->stock = $used->stock - $remain;
                        $usedQuantity = floor($remain/$drugAdd->piece_netto);
                        $stockQuantity = $remain;
                        $remain = 0;
                        $used->save();
                    }else{
                        $stockQuantity = $remain;
                        $remain = $remain - $used->stock;
                        $stockQuantity = $used->stock;
                        $usedQuantity = ceil($used->stock/$drugAdd->piece_netto);
                        $used->stock = 0;
                        $used->save();
                        $drugAdd->nextStock();
                        $used = $drugAdd->used();
                    }
                    TransactionDetail::create([
                        "transaction_id"=>$transaction->id,
                        "drug_id"=>$drugAdd->id,
                        "stock"=>$stockQuantity,
                        "name"=>$drugAdd->name." 1 pcs",
                        "quantity"=>$usedQuantity." pcs",
                        "expired"=>$expired,
                        "piece_price"=>$drugAdd->last_price,
                        "total_price"=>$drugAdd->last_price*$usedQuantity,                
                    ]);                    
                }
            }
        };
        return redirect()->route('clinic.inflows.show',$transaction->id)->with('success','Berhasil menambahkan obat');
        
    }
    public function show(string $inflows)
    {
        $transaction = Transaction::find($inflows);
        $judul = "Transaksi Obat Masuk";
        $details = $transaction->details();
        return view("pages.clinic.inflowDetail",compact('transaction','judul','details'));
    }
    
}