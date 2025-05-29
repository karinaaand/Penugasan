<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;
use App\Models\Master\Drug;
use App\Models\Master\Repack;
use App\Models\Master\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

/**
 * @OA\Tag(
 *     name="Transactions",
 *     description="API Endpoints for managing transactions"
 * )
 */
class TransactionController extends ApiController
{
    // /**
    //  * @OA\Get(
    //  *     path="/api/v1/transactions",
    //  *     summary="Get all transactions",
    //  *     tags={"Transactions"},
    //  *     @OA\Parameter(
    //  *         name="search",
    //  *         in="query",
    //  *         description="Search term for transaction code or customer name",
    //  *         @OA\Schema(type="string")
    //  *     ),
    //  *     @OA\Parameter(
    //  *         name="start_date",
    //  *         in="query",
    //  *         description="Start date for filtering transactions",
    //  *         @OA\Schema(type="string", format="date")
    //  *     ),
    //  *     @OA\Parameter(
    //  *         name="end_date",
    //  *         in="query",
    //  *         description="End date for filtering transactions",
    //  *         @OA\Schema(type="string", format="date")
    //  *     ),
    //  *     @OA\Parameter(
    //  *         name="status",
    //  *         in="query",
    //  *         description="Filter transactions by status",
    //  *         @OA\Schema(type="string", enum={"completed", "cancelled"})
    //  *     ),
    //  *     @OA\Parameter(
    //  *         name="per_page",
    //  *         in="query",
    //  *         description="Number of items per page",
    //  *         @OA\Schema(type="integer", default=15)
    //  *     ),
    //  *     @OA\Response(
    //  *         response=200,
    //  *         description="Transactions retrieved successfully",
    //  *         @OA\JsonContent(
    //  *             @OA\Property(property="status", type="string", example="success"),
    //  *             @OA\Property(property="message", type="string", example="Transactions retrieved successfully"),
    //  *             @OA\Property(property="data", type="object",
    //  *                 @OA\Property(property="current_page", type="integer", example=1),
    //  *                 @OA\Property(property="data", type="array", @OA\Items(
    //  *                     @OA\Property(property="id", type="integer", example=1),
    //  *                     @OA\Property(property="code", type="string", example="TRX-1234567890"),
    //  *                     @OA\Property(property="customer_name", type="string", example="John Doe"),
    //  *                     @OA\Property(property="customer_phone", type="string", example="081234567890"),
    //  *                     @OA\Property(property="subtotal", type="number", format="float", example=100000),
    //  *                     @OA\Property(property="discount", type="number", format="float", example=5000),
    //  *                     @OA\Property(property="tax", type="number", format="float", example=9500),
    //  *                     @OA\Property(property="total", type="number", format="float", example=104500),
    //  *                     @OA\Property(property="status", type="string", example="completed"),
    //  *                     @OA\Property(property="created_at", type="string", format="date-time")
    //  *                 )),
    //  *                 @OA\Property(property="total", type="integer", example=50)
    //  *             )
    //  *         )
    //  *     )
    //  * )
    //  */
    // public function index(Request $request)
    // {
    //     $query = Transaction::with(['details', 'user']);

    //     // Search functionality
    //     if ($request->has('search')) {
    //         $query->where(function($q) use ($request) {
    //             $q->where('code', 'like', '%' . $request->search . '%')
    //               ->orWhere('customer_name', 'like', '%' . $request->search . '%');
    //         });
    //     }

    //     // Filter by date range
    //     if ($request->has('start_date')) {
    //         $query->where('created_at', '>=', $request->start_date);
    //     }
    //     if ($request->has('end_date')) {
    //         $query->where('created_at', '<=', $request->end_date);
    //     }

    //     // Filter by status
    //     if ($request->has('status')) {
    //         $query->where('status', $request->status);
    //     }

    //     $transactions = $query->orderBy('created_at', 'desc')
    //                         ->paginate($request->per_page ?? 15);

    //     return $this->successResponse($transactions, 'Transactions retrieved successfully');
    // }

    // /**
    //  * @OA\Post(
    //  *     path="/api/v1/transactions",
    //  *     summary="Create a new transaction",
    //  *     tags={"Transactions"},
    //  *     @OA\RequestBody(
    //  *         required=true,
    //  *         @OA\JsonContent(
    //  *             required={"customer_name", "items", "payment_method"},
    //  *             @OA\Property(property="customer_id", type="integer", nullable=true, example=1),
    //  *             @OA\Property(property="customer_name", type="string", maxLength=255, example="John Doe"),
    //  *             @OA\Property(property="customer_phone", type="string", maxLength=20, nullable=true, example="081234567890"),
    //  *             @OA\Property(property="customer_address", type="string", nullable=true, example="123 Main St"),
    //  *             @OA\Property(property="items", type="array", @OA\Items(
    //  *                 @OA\Property(property="item_id", type="integer", example=1),
    //  *                 @OA\Property(property="item_type", type="string", enum={"drug", "repack"}, example="drug"),
    //  *                 @OA\Property(property="quantity", type="integer", minimum=1, example=2),
    //  *                 @OA\Property(property="price", type="number", format="float", minimum=0, example=50000)
    //  *             )),
    //  *             @OA\Property(property="discount_type", type="string", enum={"percentage", "fixed"}, nullable=true, example="percentage"),
    //  *             @OA\Property(property="discount_amount", type="number", format="float", minimum=0, nullable=true, example=10),
    //  *             @OA\Property(property="tax_rate", type="number", format="float", minimum=0, maximum=100, nullable=true, example=10),
    //  *             @OA\Property(property="payment_method", type="string", maxLength=50, example="cash"),
    //  *             @OA\Property(property="notes", type="string", nullable=true, example="Additional notes")
    //  *         )
    //  *     ),
    //  *     @OA\Response(
    //  *         response=201,
    //  *         description="Transaction created successfully",
    //  *         @OA\JsonContent(
    //  *             @OA\Property(property="status", type="string", example="success"),
    //  *             @OA\Property(property="message", type="string", example="Transaction created successfully"),
    //  *             @OA\Property(property="data", type="object",
    //  *                 @OA\Property(property="id", type="integer", example=1),
    //  *                 @OA\Property(property="code", type="string", example="TRX-1234567890"),
    //  *                 @OA\Property(property="customer_name", type="string", example="John Doe"),
    //  *                 @OA\Property(property="subtotal", type="number", format="float", example=100000),
    //  *                 @OA\Property(property="discount", type="number", format="float", example=5000),
    //  *                 @OA\Property(property="tax", type="number", format="float", example=9500),
    //  *                 @OA\Property(property="total", type="number", format="float", example=104500),
    //  *                 @OA\Property(property="status", type="string", example="completed"),
    //  *                 @OA\Property(property="details", type="array", @OA\Items(type="object")),
    //  *                 @OA\Property(property="created_at", type="string", format="date-time")
    //  *             )
    //  *         )
    //  *     ),
    //  *     @OA\Response(
    //  *         response=422,
    //  *         description="Validation error",
    //  *         @OA\JsonContent(
    //  *             @OA\Property(property="status", type="string", example="error"),
    //  *             @OA\Property(property="message", type="string", example="Validation error"),
    //  *             @OA\Property(property="errors", type="object")
    //  *         )
    //  *     ),
    //  *     @OA\Response(
    //  *         response=500,
    //  *         description="Server error",
    //  *         @OA\JsonContent(
    //  *             @OA\Property(property="status", type="string", example="error"),
    //  *             @OA\Property(property="message", type="string", example="Failed to create transaction")
    //  *         )
    //  *     )
    //  * )
    //  */
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'customer_id' => 'nullable|exists:customers,id',
    //         'customer_name' => 'required|string|max:255',
    //         'customer_phone' => 'nullable|string|max:20',
    //         'customer_address' => 'nullable|string',
    //         'items' => 'required|array|min:1',
    //         'items.*.item_id' => 'required',
    //         'items.*.item_type' => 'required|in:drug,repack',
    //         'items.*.quantity' => 'required|integer|min:1',
    //         'items.*.price' => 'required|numeric|min:0',
    //         'discount_type' => 'nullable|in:percentage,fixed',
    //         'discount_amount' => 'nullable|numeric|min:0',
    //         'tax_rate' => 'nullable|numeric|min:0|max:100',
    //         'payment_method' => 'required|string|max:50',
    //         'notes' => 'nullable|string',
    //     ]);

    //     if ($validator->fails()) {
    //         return $this->errorResponse('Validation error', $validator->errors(), 422);
    //     }

    //     try {
    //         DB::beginTransaction();

    //         // Calculate subtotal
    //         $subtotal = 0;
    //         foreach ($request->items as $item) {
    //             $subtotal += $item['quantity'] * $item['price'];
    //         }

    //         // Calculate discount
    //         $discount = 0;
    //         if ($request->discount_type && $request->discount_amount) {
    //             if ($request->discount_type === 'percentage') {
    //                 $discount = $subtotal * ($request->discount_amount / 100);
    //             } else {
    //                 $discount = $request->discount_amount;
    //             }
    //         }

    //         // Calculate tax
    //         $tax = 0;
    //         if ($request->tax_rate) {
    //             $tax = ($subtotal - $discount) * ($request->tax_rate / 100);
    //         }

    //         // Calculate total
    //         $total = $subtotal - $discount + $tax;

    //         // Create transaction
    //         $transaction = Transaction::create([
    //             'code' => 'TRX-' . time(),
    //             'customer_id' => $request->customer_id,
    //             'customer_name' => $request->customer_name,
    //             'customer_phone' => $request->customer_phone,
    //             'customer_address' => $request->customer_address,
    //             'user_id' => auth()->id(),
    //             'subtotal' => $subtotal,
    //             'discount_type' => $request->discount_type,
    //             'discount_amount' => $request->discount_amount,
    //             'discount' => $discount,
    //             'tax_rate' => $request->tax_rate,
    //             'tax' => $tax,
    //             'total' => $total,
    //             'payment_method' => $request->payment_method,
    //             'notes' => $request->notes,
    //             'status' => 'completed',
    //         ]);

    //         // Create transaction details and update stock
    //         foreach ($request->items as $item) {
    //             $transaction->details()->create([
    //                 'item_id' => $item['item_id'],
    //                 'item_type' => $item['item_type'],
    //                 'quantity' => $item['quantity'],
    //                 'price' => $item['price'],
    //                 'subtotal' => $item['quantity'] * $item['price'],
    //             ]);

    //             // Update stock
    //             if ($item['item_type'] === 'drug') {
    //                 $drug = Drug::find($item['item_id']);
    //                 $drug->decrement('stock', $item['quantity']);
    //             } else {
    //                 $repack = Repack::find($item['item_id']);
    //                 $repack->decrement('stock', $item['quantity']);
    //             }
    //         }

    //         // Update customer loyalty points if customer exists
    //         if ($request->customer_id) {
    //             $customer = Customer::find($request->customer_id);
    //             $points = floor($total / 1000); // 1 point for every 1000 in total
    //             $customer->increment('loyalty_points', $points);
    //         }

    //         DB::commit();

    //         return $this->successResponse($transaction->load(['customer', 'user', 'details']), 'Transaction created successfully', 201);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return $this->errorResponse('Failed to create transaction: ' . $e->getMessage(), [], 500);
    //     }
    // }

    // /**
    //  * @OA\Get(
    //  *     path="/api/v1/transactions/{transaction}",
    //  *     summary="Get transaction details",
    //  *     tags={"Transactions"},
    //  *     @OA\Parameter(
    //  *         name="transaction",
    //  *         in="path",
    //  *         required=true,
    //  *         description="Transaction ID",
    //  *         @OA\Schema(type="integer")
    //  *     ),
    //  *     @OA\Response(
    //  *         response=200,
    //  *         description="Transaction details retrieved successfully",
    //  *         @OA\JsonContent(
    //  *             @OA\Property(property="status", type="string", example="success"),
    //  *             @OA\Property(property="message", type="string", example="Transaction retrieved successfully"),
    //  *             @OA\Property(property="data", type="object",
    //  *                 @OA\Property(property="id", type="integer", example=1),
    //  *                 @OA\Property(property="code", type="string", example="TRX-1234567890"),
    //  *                 @OA\Property(property="customer_name", type="string", example="John Doe"),
    //  *                 @OA\Property(property="customer_phone", type="string", example="081234567890"),
    //  *                 @OA\Property(property="customer_address", type="string", example="123 Main St"),
    //  *                 @OA\Property(property="subtotal", type="number", format="float", example=100000),
    //  *                 @OA\Property(property="discount", type="number", format="float", example=5000),
    //  *                 @OA\Property(property="tax", type="number", format="float", example=9500),
    //  *                 @OA\Property(property="total", type="number", format="float", example=104500),
    //  *                 @OA\Property(property="status", type="string", example="completed"),
    //  *                 @OA\Property(property="details", type="array", @OA\Items(type="object")),
    //  *                 @OA\Property(property="created_at", type="string", format="date-time")
    //  *             )
    //  *         )
    //  *     ),
    //  *     @OA\Response(
    //  *         response=404,
    //  *         description="Transaction not found"
    //  *     )
    //  * )
    //  */
    // public function show(Transaction $transaction)
    // {
    //     $transaction->load(['details', 'user']);
    //     return $this->successResponse($transaction, 'Transaction retrieved successfully');
    // }

    // /**
    //  * @OA\Post(
    //  *     path="/api/v1/transactions/{transaction}/cancel",
    //  *     summary="Cancel a transaction",
    //  *     tags={"Transactions"},
    //  *     @OA\Parameter(
    //  *         name="transaction",
    //  *         in="path",
    //  *         required=true,
    //  *         description="Transaction ID",
    //  *         @OA\Schema(type="integer")
    //  *     ),
    //  *     @OA\Response(
    //  *         response=200,
    //  *         description="Transaction cancelled successfully",
    //  *         @OA\JsonContent(
    //  *             @OA\Property(property="status", type="string", example="success"),
    //  *             @OA\Property(property="message", type="string", example="Transaction cancelled successfully"),
    //  *             @OA\Property(property="data", type="object",
    //  *                 @OA\Property(property="id", type="integer", example=1),
    //  *                 @OA\Property(property="code", type="string", example="TRX-1234567890"),
    //  *                 @OA\Property(property="status", type="string", example="cancelled")
    //  *             )
    //  *         )
    //  *     ),
    //  *     @OA\Response(
    //  *         response=400,
    //  *         description="Transaction is already cancelled",
    //  *         @OA\JsonContent(
    //  *             @OA\Property(property="status", type="string", example="error"),
    //  *             @OA\Property(property="message", type="string", example="Transaction is already cancelled")
    //  *         )
    //  *     ),
    //  *     @OA\Response(
    //  *         response=404,
    //  *         description="Transaction not found"
    //  *     ),
    //  *     @OA\Response(
    //  *         response=500,
    //  *         description="Server error",
    //  *         @OA\JsonContent(
    //  *             @OA\Property(property="status", type="string", example="error"),
    //  *             @OA\Property(property="message", type="string", example="Failed to cancel transaction")
    //  *         )
    //  *     )
    //  * )
    //  */
    // public function cancel(Transaction $transaction)
    // {
    //     if ($transaction->status === 'cancelled') {
    //         return $this->errorResponse('Transaction is already cancelled', [], 400);
    //     }

    //     try {
    //         DB::beginTransaction();

    //         // Restore stock
    //         foreach ($transaction->details as $detail) {
    //             if ($detail->item_type === 'drug') {
    //                 $drug = \App\Models\Master\Drug::find($detail->item_id);
    //                 $drug->increment('stock', $detail->quantity);
    //             } else {
    //                 $repack = \App\Models\Master\Repack::find($detail->item_id);
    //                 $repack->increment('stock', $detail->quantity);
    //             }
    //         }

    //         $transaction->update(['status' => 'cancelled']);

    //         DB::commit();

    //         return $this->successResponse($transaction, 'Transaction cancelled successfully');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return $this->errorResponse('Failed to cancel transaction: ' . $e->getMessage(), [], 500);
    //     }
    // }

    // /**
    //  * @OA\Get(
    //  *     path="/api/v1/transactions/summary",
    //  *     summary="Get transaction summary for a period",
    //  *     tags={"Transactions"},
    //  *     @OA\Parameter(
    //  *         name="start_date",
    //  *         in="query",
    //  *         required=true,
    //  *         description="Start date for summary",
    //  *         @OA\Schema(type="string", format="date")
    //  *     ),
    //  *     @OA\Parameter(
    //  *         name="end_date",
    //  *         in="query",
    //  *         required=true,
    //  *         description="End date for summary",
    //  *         @OA\Schema(type="string", format="date")
    //  *     ),
    //  *     @OA\Response(
    //  *         response=200,
    //  *         description="Transaction summary retrieved successfully",
    //  *         @OA\JsonContent(
    //  *             @OA\Property(property="status", type="string", example="success"),
    //  *             @OA\Property(property="message", type="string", example="Transaction summary retrieved successfully"),
    //  *             @OA\Property(property="data", type="object",
    //  *                 @OA\Property(property="total_transactions", type="integer", example=100),
    //  *                 @OA\Property(property="total_subtotal", type="number", format="float", example=10000000),
    //  *                 @OA\Property(property="total_discount", type="number", format="float", example=500000),
    //  *                 @OA\Property(property="total_tax", type="number", format="float", example=950000),
    //  *                 @OA\Property(property="total_amount", type="number", format="float", example=10450000),
    //  *                 @OA\Property(property="total_customers", type="integer", example=50)
    //  *             )
    //  *         )
    //  *     ),
    //  *     @OA\Response(
    //  *         response=422,
    //  *         description="Validation error",
    //  *         @OA\JsonContent(
    //  *             @OA\Property(property="status", type="string", example="error"),
    //  *             @OA\Property(property="message", type="string", example="Validation error"),
    //  *             @OA\Property(property="errors", type="object")
    //  *         )
    //  *     )
    //  * )
    //  */
    // public function summary(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date|after_or_equal:start_date',
    //     ]);

    //     if ($validator->fails()) {
    //         return $this->errorResponse('Validation error', $validator->errors(), 422);
    //     }

    //     $summary = Transaction::whereBetween('created_at', [$request->start_date, $request->end_date])
    //                         ->select(
    //                             DB::raw('COUNT(*) as total_transactions'),
    //                             DB::raw('SUM(subtotal) as total_subtotal'),
    //                             DB::raw('SUM(discount) as total_discount'),
    //                             DB::raw('SUM(tax) as total_tax'),
    //                             DB::raw('SUM(total) as total_amount'),
    //                             DB::raw('COUNT(DISTINCT customer_id) as total_customers')
    //                         )
    //                         ->first();

    //     return $this->successResponse($summary, 'Transaction summary retrieved successfully');
    // }

    /**
     * @OA\Get(
     *     path="/api/v1/transactions/top-selling",
     *     summary="Get top selling items for a period",
     *     tags={"Transactions"},
     *     @OA\Parameter(
     *         name="start_date",
     *         in="query",
     *         required=true,
     *         description="Start date for analysis",
     *         @OA\Schema(type="string", format="date")
     *     ),
     *     @OA\Parameter(
     *         name="end_date",
     *         in="query",
     *         required=true,
     *         description="End date for analysis",
     *         @OA\Schema(type="string", format="date")
     *     ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         description="Number of top items to return",
     *         @OA\Schema(type="integer", minimum=1, maximum=100, default=10)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Top selling items retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="Top selling items retrieved successfully"),
     *             @OA\Property(property="data", type="array", @OA\Items(
     *                 @OA\Property(property="drug_id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Paracetamol 500mg"),
     *                 @OA\Property(property="total_quantity", type="number", format="float", example=80),
     *                 @OA\Property(property="total_amount", type="number", format="float", example=400000),
     *                 @OA\Property(property="drug", type="object", nullable=true,
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="code", type="string", example="PC0001"),
     *                     @OA\Property(property="name", type="string", example="Paracetamol 500mg"),
     *                     @OA\Property(property="category", type="object", nullable=true,
     *                         @OA\Property(property="id", type="integer", example=1),
     *                         @OA\Property(property="name", type="string", example="Analgesik"),
     *                         @OA\Property(property="code", type="string", example="AG")
     *                     ),
     *                     @OA\Property(property="manufacture", type="object", nullable=true,
     *                         @OA\Property(property="id", type="integer", example=1),
     *                         @OA\Property(property="name", type="string", example="Kimia Farma")
     *                     ),
     *                     @OA\Property(property="variant", type="object", nullable=true,
     *                         @OA\Property(property="id", type="integer", example=1),
     *                         @OA\Property(property="name", type="string", example="Tablet")
     *                     ),
     *                     @OA\Property(property="piece_netto", type="integer", example=500),
     *                     @OA\Property(property="piece_price", type="integer", example=5000),
     *                     @OA\Property(property="last_price", type="integer", example=5000)
     *                 )
     *             ))
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="message", type="string", example="Validation error"),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public function topSelling(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'limit' => 'nullable|integer|min:1|max:100',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation error', $validator->errors(), 422);
        }

        $limit = $request->limit ?? 10;

        $topSelling = TransactionDetail::whereHas('transaction', function($query) use ($request) {
                            $query->whereBetween('created_at', [$request->start_date, $request->end_date])
                                  ->where('variant', 'Checkout'); // Only include checkout transactions
                        })
                        ->select(
                            'drug_id',
                            DB::raw('SUM(CAST(REPLACE(quantity, " pcs", "") AS DECIMAL(10,2))) as total_quantity'),
                            DB::raw('SUM(total_price) as total_amount'),
                            DB::raw('MAX(name) as name') // Get the drug name
                        )
                        ->groupBy('drug_id')
                        ->orderBy('total_quantity', 'desc')
                        ->limit($limit)
                        ->get();

        // Get drug information separately
        $drugIds = $topSelling->pluck('drug_id')->unique();
        $drugs = Drug::whereIn('id', $drugIds)->get();

        // Combine the data
        $result = $topSelling->map(function($item) use ($drugs) {
            $drug = $drugs->firstWhere('id', $item->drug_id);
            return [
                'drug_id' => $item->drug_id,
                'name' => $item->name,
                'total_quantity' => $item->total_quantity,
                'total_amount' => $item->total_amount,
                'drug' => $drug ? [
                    'id' => $drug->id,
                    'code' => $drug->code,
                    'name' => $drug->name,
                    'category' => $drug->category(),
                    'manufacture' => $drug->manufacture(),
                    'variant' => $drug->variant(),
                    'piece_netto' => $drug->piece_netto,
                    'piece_price' => $drug->piece_price,
                    'last_price' => $drug->last_price,
                ] : null
            ];
        });

        return $this->successResponse($result, 'Top selling items retrieved successfully');
    }
} 