<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Models\Master\Category;
use App\Models\Master\Drug;
use App\Models\Master\Manufacture;
use App\Models\Master\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

/**
 * @OA\Tag(
 *     name="Drugs",
 *     description="API Endpoints for managing drugs"
 * )
 */
class DrugController extends ApiController
{
    /**
     * @OA\Get(
     *     path="/api/v1/drugs",
     *     summary="Get list of drugs",
     *     tags={"Drugs"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Search by name or code",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="category_id",
     *         in="query",
     *         description="Filter by category ID",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="manufacture_id",
     *         in="query",
     *         description="Filter by manufacturer ID",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         description="Number of items per page",
     *         required=false,
     *         @OA\Schema(type="integer", default=15)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of drugs retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Drugs retrieved successfully"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="current_page", type="integer"),
     *                 @OA\Property(property="data", type="array", @OA\Items(
     *                     @OA\Property(property="id", type="integer"),
     *                     @OA\Property(property="name", type="string"),
     *                     @OA\Property(property="code", type="string"),
     *                     @OA\Property(property="category", type="object"),
     *                     @OA\Property(property="manufacture", type="object"),
     *                     @OA\Property(property="variant", type="object"),
     *                     @OA\Property(property="repacks", type="array", @OA\Items(type="object"))
     *                 ))
     *             )
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        $query = Drug::query();

        // Search functionality
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('code', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by manufacturer
        if ($request->has('manufacture_id')) {
            $query->where('manufacture_id', $request->manufacture_id);
        }

        $drugs = $query->paginate($request->per_page ?? 15);

        // Load relationships manually
        $drugs->getCollection()->transform(function ($drug) {
            $drug->category = $drug->category();
            $drug->manufacture = $drug->manufacture();
            $drug->variant = $drug->variant();
            $drug->repacks = $drug->repacks();
            return $drug;
        });

        return $this->successResponse($drugs, 'Drugs retrieved successfully');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/drugs",
     *     summary="Create a new drug",
     *     tags={"Drugs"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "category_id", "manufacture_id", "variant_id", "maximum_capacity", 
     *                      "minimum_capacity", "pack_quantity", "pack_margin", "piece_quantity", 
     *                      "piece_margin", "piece_netto", "piece_unit", "last_price", "last_discount"},
     *             @OA\Property(property="name", type="string", example="Paracetamol 500mg"),
     *             @OA\Property(property="category_id", type="integer", example=1),
     *             @OA\Property(property="manufacture_id", type="integer", example=1),
     *             @OA\Property(property="variant_id", type="integer", example=1),
     *             @OA\Property(property="maximum_capacity", type="integer", example=1000),
     *             @OA\Property(property="minimum_capacity", type="integer", example=100),
     *             @OA\Property(property="pack_quantity", type="integer", example=10),
     *             @OA\Property(property="pack_margin", type="integer", example=5),
     *             @OA\Property(property="piece_quantity", type="integer", example=100),
     *             @OA\Property(property="piece_margin", type="integer", example=2),
     *             @OA\Property(property="piece_netto", type="integer", example=500),
     *             @OA\Property(property="piece_unit", type="string", enum={"ml", "mg", "butir"}, example="mg"),
     *             @OA\Property(property="last_price", type="number", format="float", example=100000),
     *             @OA\Property(property="last_discount", type="number", format="float", example=0)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Drug created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Drug created successfully"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="code", type="string"),
     *                 @OA\Property(property="category", type="object"),
     *                 @OA\Property(property="manufacture", type="object"),
     *                 @OA\Property(property="variant", type="object"),
     *                 @OA\Property(property="repacks", type="array", @OA\Items(type="object"))
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'manufacture_id' => 'required|exists:manufactures,id',
            'variant_id' => 'required|exists:variants,id',
            'maximum_capacity' => 'required|integer|min:0',
            'minimum_capacity' => 'required|integer|min:0',
            'pack_quantity' => 'required|integer|min:1',
            'pack_margin' => 'required|integer|min:0',
            'piece_quantity' => 'required|integer|min:1',
            'piece_margin' => 'required|integer|min:0',
            'piece_netto' => 'required|integer|min:1',
            'piece_unit' => 'required|in:ml,mg,butir',
            'last_price' => 'required|numeric|min:0',
            'last_discount' => 'required|numeric|min:0|max:100'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation error', $validator->errors(), 422);
        }

        try {
            DB::beginTransaction();

            $category = Category::findOrFail($request->category_id);
            $request->merge(['code' => $this->generateCode($category)]);

            $drug = Drug::create($request->all());
            
            // Create default repacks and stock
            $drug->default_repacks();
            $drug->default_stock();

            DB::commit();

            // Load relationships manually
            $drug->category = $drug->category();
            $drug->manufacture = $drug->manufacture();
            $drug->variant = $drug->variant();
            $drug->repacks = $drug->repacks();

            return $this->successResponse($drug, 'Drug created successfully', 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse('Failed to create drug: ' . $e->getMessage(), [], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/drugs/{id}",
     *     summary="Get drug details",
     *     tags={"Drugs"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Drug ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Drug details retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Drug retrieved successfully"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="code", type="string"),
     *                 @OA\Property(property="category", type="object"),
     *                 @OA\Property(property="manufacture", type="object"),
     *                 @OA\Property(property="variant", type="object"),
     *                 @OA\Property(property="repacks", type="array", @OA\Items(type="object"))
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Drug not found"
     *     )
     * )
     */
    public function show(Drug $drug)
    {
        // Load relationships manually
        $drug->category = $drug->category();
        $drug->manufacture = $drug->manufacture();
        $drug->variant = $drug->variant();
        $drug->repacks = $drug->repacks();

        return $this->successResponse($drug, 'Drug retrieved successfully');
    }

    /**
     * @OA\Put(
     *     path="/api/v1/drugs/{id}",
     *     summary="Update drug details",
     *     tags={"Drugs"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Drug ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "category_id", "manufacture_id", "variant_id", "maximum_capacity", 
     *                      "minimum_capacity", "pack_quantity", "pack_margin", "piece_quantity", 
     *                      "piece_margin", "piece_netto", "piece_unit", "last_price", "last_discount"},
     *             @OA\Property(property="name", type="string", example="Paracetamol 500mg"),
     *             @OA\Property(property="category_id", type="integer", example=1),
     *             @OA\Property(property="manufacture_id", type="integer", example=1),
     *             @OA\Property(property="variant_id", type="integer", example=1),
     *             @OA\Property(property="maximum_capacity", type="integer", example=1000),
     *             @OA\Property(property="minimum_capacity", type="integer", example=100),
     *             @OA\Property(property="pack_quantity", type="integer", example=10),
     *             @OA\Property(property="pack_margin", type="integer", example=5),
     *             @OA\Property(property="piece_quantity", type="integer", example=100),
     *             @OA\Property(property="piece_margin", type="integer", example=2),
     *             @OA\Property(property="piece_netto", type="integer", example=500),
     *             @OA\Property(property="piece_unit", type="string", enum={"ml", "mg", "butir"}, example="mg"),
     *             @OA\Property(property="last_price", type="number", format="float", example=100000),
     *             @OA\Property(property="last_discount", type="number", format="float", example=0)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Drug updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Drug updated successfully"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="code", type="string"),
     *                 @OA\Property(property="category", type="object"),
     *                 @OA\Property(property="manufacture", type="object"),
     *                 @OA\Property(property="variant", type="object"),
     *                 @OA\Property(property="repacks", type="array", @OA\Items(type="object"))
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Drug not found"
     *     )
     * )
     */
    public function update(Request $request, Drug $drug)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'manufacture_id' => 'required|exists:manufactures,id',
            'variant_id' => 'required|exists:variants,id',
            'maximum_capacity' => 'required|integer|min:0',
            'minimum_capacity' => 'required|integer|min:0',
            'pack_quantity' => 'required|integer|min:1',
            'pack_margin' => 'required|integer|min:0',
            'piece_quantity' => 'required|integer|min:1',
            'piece_margin' => 'required|integer|min:0',
            'piece_netto' => 'required|integer|min:1',
            'piece_unit' => 'required|in:ml,mg,butir',
            'last_price' => 'required|numeric|min:0',
            'last_discount' => 'required|numeric|min:0|max:100'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation error', $validator->errors(), 422);
        }

        try {
            DB::beginTransaction();

            $drug->update($request->all());
            
            // Update prices for all repacks if last_price or last_discount changed
            if ($request->has('last_price') || $request->has('last_discount')) {
                $repacks = $drug->repacks();
                foreach ($repacks as $repack) {
                    $repack->update([
                        'price' => $drug->calculate_price($repack->quantity, $repack->margin)
                    ]);
                }
            }

            DB::commit();

            // Load relationships manually
            $drug->category = $drug->category();
            $drug->manufacture = $drug->manufacture();
            $drug->variant = $drug->variant();
            $drug->repacks = $drug->repacks();

            return $this->successResponse($drug, 'Drug updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse('Failed to update drug: ' . $e->getMessage(), [], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/drugs/{id}",
     *     summary="Delete a drug",
     *     tags={"Drugs"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Drug ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Drug deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Drug deleted successfully"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="code", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Cannot delete drug with existing stock"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Drug not found"
     *     )
     * )
     */
    public function destroy(Drug $drug)
    {
        try {
            // Check if drug has any stock in warehouse or clinic
            if ($drug->warehouse->quantity > 0 || $drug->clinic->quantity > 0) {
                return $this->errorResponse('Cannot delete drug with existing stock', [], 422);
            }

            $deletedData = $drug->toArray();
            $drug->delete();

            return $this->successResponse($deletedData, 'Drug deleted successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to delete drug: ' . $e->getMessage(), [], 500);
        }
    }

    /**
     * Generate drug code based on category.
     */
    private function generateCode(Category $category): string
    {
        $lastDrug = $category->drugs()->last();
        if (!$lastDrug) {
            $nextNumber = 1;
        } else {
            $lastNumber = (int) substr($lastDrug->code, -4);
            $nextNumber = $lastNumber + 1;
        }
        $paddedNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        return $category->code . $paddedNumber;
    }
} 