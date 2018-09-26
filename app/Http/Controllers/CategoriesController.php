<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat=DB::table('categories')->paginate(10);
        return view('categories.index')->with('cat', $cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required',
            'description' => 'required'
        ]);
        $name =$request->input('name');
       // $serp = new serviceprov();
       DB::table('categories')->insert(['name' => $name, 
                                        'description' => $request->input('description'),
                                        'created_date' => Carbon::now(),
                                        'active' => 1 ]);
        return redirect('/categories')->with('success', 'Category Created');
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
        $cat = DB::table('categories')->where('CAT_ID', '=', $id)->get();
        // return $servp;
         return view('categories.edit')->with('cat',$cat);
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
        $this->validate($request,[
            'name' =>'required',
            'description' => 'required'
        ]);
        $name =$request->input('name');
       // $serp = new serviceprov();
       DB::table('categories')
            ->where('CAT_ID', $id)
            ->update(['name' =>  $name,
                      'description' => $request->input('description')]);
     
        return redirect('/categories')->with('success', 'Category UPDATED !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('CAT_ID', '=', $id)->delete();
        return redirect('/categories')->with('success', 'Category Removed !');
    }
}
