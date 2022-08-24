<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ClientController extends Controller
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
        $name = $request->name;
        $city = $request->city_id;
        $state = $request->state_id;
        $order = $request->order;

        $clients = Client::select('*');

        $order == "all" ? $clients->latest() : $clients->orderBy('first_name');

        if ($name || $city || $state) {

            $clients->where(function ($qeury) use ($name,$city,$state) {
                if ($name) {
                    $qeury->where('first_name', 'LIKE', '%'.$name.'%');
                    $qeury->orwhere('last_name', 'LIKE', '%'.$name.'%');
                }
                if ($city) {
                    $qeury->Where('city_id', $city);
                }
                if ($state) {
                    $qeury->Where('state_id', $state);
                }
            });

        } else if($search_text) {

            $clients->where(function ($qeury) use ($search_text) {
                $qeury->where('first_name', 'LIKE', '%'.$search_text.'%');
                $qeury->orwhere('last_name', 'LIKE', '%'.$search_text.'%');
                $qeury->orWhere('email', 'LIKE', "%" . $search_text . "%");
                $qeury->orWhere('mobile_number', 'LIKE', "%" . $search_text . "%");
                $qeury->orWhere('address', 'LIKE', "%" . $search_text . "%");
            });

        }

        if ($paginate) {
            $clients = $clients->paginate();
        } else {
            $clients = $clients->get();
        }

        foreach ($clients as $key => $client) {
            $client->full_name = $client->first_name." ".$client->last_name;
        }

        return response()->json([
            'clients' => $clients,
            'status' => 'SUCCESS',
            'message' => '']
            ,200
        );

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
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:clients',
            'mobile_number' => 'required|min:10|numeric|unique:clients',
        ]);

        if($validator->fails()){
            $errorString = implode(",", $validator->messages()->all());
            return response()->json([
                'status' => 'FAIL',
                'message' => $errorString //$validator->errors()->first()
            ]);
        }

        $photo_path = "";

        if(!empty($request->photo)) {
            $path = 'assets/clients/profile_pics/';
            $first_name  = strtolower(str_replace(' ', '_',$request->first_name));
            $profile_pic_name = User::createImageFromBase64($request->photo, $first_name, $path);
            $photo_path = $profile_pic_name;
        }

        $client = Client::create([
            'external_id' => Uuid::uuid4()->toString(),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'mobile_number' => $request->get('mobile_number'),
            'address' => $request->get('address'),
            'state_id' => $request->get('state'),
            'city_id' => $request->get('city_id'),
            'photo' => $photo_path
        ]);

        return response()->json([
            'client' => $client,
            'status' => 'SUCCESS',
            'message' => 'Client created successfully !']
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
    public function update($external_id, Request $request)
    {

        $client = Client::where('external_id',$external_id)->first();

        $client->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'mobile_number' => $request->get('mobile_number'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'state_id' => $request->get('state_id'),
            'city_id' => $request->get('city_id')
        ]);

        if(!empty($request->photo)) {
            $path = 'assets/clients/profile_pics/';
            $first_name  = strtolower(str_replace(' ', '_',$request->first_name));
            $profile_pic_name = User::createImageFromBase64($request->photo, $first_name, $path);
            $client->update([
                'photo' => $profile_pic_name
            ]);
        }

        return response()->json([
            'client' => $client,
            'status' => 'SUCCESS',
            'message' => 'Client Successfully Updated !']
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
        //
    }
}
