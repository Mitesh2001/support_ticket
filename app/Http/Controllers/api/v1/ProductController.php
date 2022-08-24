<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Validator;

class ProductController extends Controller
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

        $order = $request->order;

        $products = product::select('*');

        $order == "all" ? $products->latest() : $products->orderBy('name');

        if ($search_text) {
            $products->where(function ($query) use ($search_text)
            {
                $query->where('name', 'LIKE', '%'.$search_text.'%');
                $query->orwhere('quantity', 'LIKE', '%'.$search_text.'%');
            });
        }

        $products = $paginate ? $products->paginate() : $products->get();

        return response()->json([
            'products' => $products,
            'status' => 'SUCCESS',
            'message' => 'All product fetched !'
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

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            $errorString = implode(",", $validator->messages()->all());
            return response()->json([
                'status' => 'FAIL',
                'message' => $errorString //$validator->errors()->first()
            ]);
        }

        $product = product::create([
            'external_id' => Uuid::uuid4()->toString(),
            'name' => $request->name,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'barcode_scan' => $request->barcode_scan
        ]);

        return response()->json([
            'product' => $product,
            'status' => 'SUCCESS',
            'message' => 'Product created successfully !']
            ,200
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product =  product::find($id);

        $product->update([
            'name' => $request->name,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'barcode_scan' => $request->barcode_scan
        ]);

        return response()->json([
            'product' => $product,
            'status' => 'SUCCESS',
            'message' => 'Product Updated successfully !']
            ,200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  product::find($id);

        $product->delete();

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Product deleted successfully !']
            ,200
        );
    }

    public function productTypes()
    {
        $product_types = [];

        return response()->json([
            'product' => $product_types,
            'status' => 'SUCCESS',
            'message' => 'All product types!']
            ,200
        );
    }

    public function stockCheck(Request $request)
    {
        $product = product::find($request->product_id);

        if ($product->quantity >= $request->qty) {

            return response()->json([
                'product' => $product,
                'status' => 'SUCCESS',
                'message' => 'Product Availbale !']
                ,200
            );

        } else {

            return response()->json([
                'status' => 'FAIL',
                'message' => 'Product not Availbale in Stock !',
                'available_qty' => $product->quantity]
                ,200
            );

        }
    }
}
