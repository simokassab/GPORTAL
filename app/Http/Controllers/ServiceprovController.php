<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serviceprov;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceprovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceprov=DB::table('serviceprov')->paginate(10);
        return view('serviceprovider.index')->with('serviceprov', $serviceprov);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serviceprovider.create');
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
       DB::table('serviceprov')->insert(['name' => $name, 
                                        'description' => $request->input('description'),
                                        'created_date' => Carbon::now(),
                                        'active' => 1 ]);
        return redirect('/serviceprovider')->with('success', 'SP Created');
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
        $servp = DB::table('serviceprov')->where('SP_ID', '=', $id)->get();
       // return $servp;
        return view('serviceprovider.edit')->with('servp',$servp);
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
       DB::table('serviceprov')
            ->where('SP_ID', $id)
            ->update(['name' =>  $name,
                      'description' => $request->input('description')]);
     
        return redirect('/serviceprovider')->with('success', 'SP UPDATED !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('serviceprov')->where('SP_ID', '=', $id)->delete();
        return redirect('/serviceprovider')->with('success', 'SP Removed !');
    }
}
