<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComplainType;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ComplainTypesController extends Controller
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
        $complain_types = ComplainType::select('*');

        if ($search_text) {
            $complain_types->where(function ($query) use ($search_text)
            {
                $query->where('title', 'LIKE', '%'.$search_text.'%');
            });
        }

        $complain_types = $paginate ? $complain_types->paginate() : $complain_types->get();

        return response()->json([
            'complain_types' => $complain_types,
            'status' => 'SUCCESS',
            'message' => 'All Complain types fetched !'
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

        $type = ComplainType::create([
            'external_id' => Uuid::uuid4()->toString(),
            'title' => $request->title
        ]);

        return response()->json([
            'complain_type' => $type,
            'status' => 'SUCCESS',
            'message' => 'complain type Added successfully !']
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
        $complain_type = ComplainType::find($id);

        $complain_type->update([
            'title' => $request->title
        ]);

        return response()->json([
            'complain_type' => $complain_type,
            'status' => 'SUCCESS',
            'message' => 'Complain type Updated successfully !']
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
        $complain_type = ComplainType::find($id);

        $complain_type->delete();

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Complain type Deleted successfully !']
            ,200
        );
    }

    public function addExpense(Request $request)
    {
        $expense = DB::table('expenses')->insert([
            'title' => $request->title,
            'price' => $request->price,
            'date' => $request->date
        ]);
    }
}
