<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terms;

class TableController extends Controller
{

    private static function getData()
    {

        $data = Terms::all(["term", "content", "id"]);
        return  $data;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view("table.index", ["data" => self::getData()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("table.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "term" => "required",
            "content" => "required"
        ]);

        $terms = new Terms();

        $terms->term =  strip_tags($request->input("term"));
        $terms->content = strip_tags($request->input("content"));
        $terms->save();

        return redirect()->route("table.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Terms::findOrFail($id);

        return view("table.show", ["data" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Terms::findOrFail($id);

        return view("table.edit", ["data" => $data]);
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
        $request->validate([
            "term" => "required",
            "content" => "required",

        ]);

        $record = Terms::findOrFail($id);

        $record->term =  strip_tags($request->input("term"));
        $record->content =  strip_tags($request->input("content"));

        $record->save();

        return redirect()->route("table.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy($id)
    {

        $record = Terms::findOrFail($id);

        $record->destroy([$id]);

        return redirect()->route("table.index");
    }
}
