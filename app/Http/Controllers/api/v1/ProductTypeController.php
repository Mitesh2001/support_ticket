<?php

namespace App\Http\Controllers\api\v1;

use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_text = $request->search_text;
        $paginate = $request->paginate ?? 0;
        $product_types = ProductType::select('*');

        if ($search_text) {
            $product_types->where(function ($query) use ($search_text)
            {
                $query->where('title', 'LIKE', '%'.$search_text.'%');
            });
        }

        $product_types = $paginate ? $product_types->paginate() : $product_types->get();

        return response()->json([
            'products' => $product_types,
            'status' => 'SUCCESS',
            'message' => 'All product types fetched !'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = ProductType::create([
            'external_id' => Uuid::uuid4()->toString(),
            'title' => $request->title
        ]);

        return response()->json([
            'product_type' => $type,
            'status' => 'SUCCESS',
            'message' => 'Product type Added successfully !']
            ,200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        $productType->update([
            'title' => $request->title
        ]);

        return response()->json([
            'product_type' => $productType,
            'status' => 'SUCCESS',
            'message' => 'Product type Updated successfully !']
            ,200
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Product type Deleted successfully !']
            ,200
        );
    }
}
