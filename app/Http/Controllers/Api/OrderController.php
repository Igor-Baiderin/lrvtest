<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $this->validate($request, [
            'order.name' => 'required|string|min:2|max:255',
            'order.phone' => 'required|string|min:9',
            'order.message' => 'required|string|min:9',
        ]);

        $newRecord = new Camp();
        $newRecord->name = $request->input('newRecord')['name'];
        $newRecord->slug = Str::slug($request->input('newRecord')['name']);
        $newRecord->summary = $request->input('newRecord')['summary'];
        $newRecord->image = $request->input('newRecord')['image'];
        $newRecord->region_id = $request->input('newRecord')['region_id']['id'];
        $newRecord->save();
        return response(['newRecord' => $newRecord]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
