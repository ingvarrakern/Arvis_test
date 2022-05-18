<?php

namespace App\Http\Controllers;

use App\Models\Resources;
use App\Http\Requests\StoreResourcesRequest;
use App\Http\Requests\UpdateResourcesRequest;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { //A request for filtering one of the resources (e.g. by title, by date etc...)
        $resources = Resources::when(isset($request->title), function($query) use($request){
                        $query->where("title","like","%".$request->title."%");
                    })

                    ->when(isset($request->date), function($query) use($request){
                        $query->where("date","=",$request->date);
                    })
                    
                    ->get();
        return response()->json(["data"=>$resources],200);
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
     * @param  \App\Http\Requests\StoreResourcesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResourcesRequest $request)
    {
        $resource = Resources::create($request->validated());

        return response()->json(["data"=>$resource],200);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $resource = Resources::find($request->id);
        return response()->json(["data"=>$resource],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resources  $resources
     * @return \Illuminate\Http\Response
     */
    public function edit(Resources $resources)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResourcesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResourcesRequest $request)
    {
        // поиск содержимого по запрашиваемому ид
        $resource = Resources::find($request->id);
        // изменение/обновление отфильтрованного содержимого
        $resource->update($request->validated());
        return response()->json(["data"=>$resource],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    { 
        Resources::find($request->id)->delete(); //поиск модели по ид и удаление
        return response()->json(["message"=>"ID: ". $request->id . " was deleted" ],200);
    }
}
