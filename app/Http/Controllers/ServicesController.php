<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serviceprov;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = DB::table('services')
            ->join('serviceprov', 'services.SP_ID_FK', '=', 'serviceprov.SP_ID')
            ->join('categories', 'services.CAT_ID_FK', '=', 'categories.CAT_ID')
            ->select('services.*', 'serviceprov.name as SP_NAME', 'categories.name as CAT_NAME')
            ->paginate(10);
       return view('services.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceprov=DB::table('serviceprov')->select('SP_ID', 'name')->get();
        $cat=DB::table('categories')->select('CAT_ID', 'name')->get();
       // return $serviceprov;
        return view('services.create')->with('serviceprov', $serviceprov)->with('cat', $cat);
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
            'description' => 'required',
            'image' => 'required',
            'body' => 'required'
        ]);
        $name =$request->input('name');
        $file = $request->file('image');
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=200,min_height=200',
        ]);
        $nameimg = $file->getClientOriginalName();
        $file->move('uploads/', $nameimg);
        DB::table('services')->insert(['name' => $name, 
                                        'description' => $request->input('description'),
                                        'SP_ID_FK' => $request->input('serviceprov'),
                                        'CAT_ID_FK' => $request->input('cat'),
                                        'body' => $request->input('body'),
                                        'images' =>  $nameimg,
                                        'created_date' => Carbon::now(),
                                        'active' => 1 ]);
        return redirect('/services')->with('success', 'Service Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = DB::table('services')
        ->join('serviceprov', 'services.SP_ID_FK', '=', 'serviceprov.SP_ID')
        ->join('categories', 'services.CAT_ID_FK', '=', 'categories.CAT_ID')
        ->select('services.*', 'serviceprov.name as SP_NAME', 'categories.name as CAT_NAME')
        ->where('SV_ID',$id)->get();

        $serviceprov=DB::table('serviceprov')->select('SP_ID', 'name')->get();
        $cat=DB::table('categories')->select('CAT_ID', 'name')->get();
       // $servp = DB::table('services')->where('SP_ID', '=', $id)->get();
        //return $services;
        return view('services.edit')->with('services',$services)->with('serviceprov',$serviceprov)
        ->with('cat',$cat);
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
            'description' => 'required',
            'body' => 'required'
        ]);
        $name =$request->input('name');
        $file = $request->file('image');
        if ($file !=''){
            $nameimg = $file->getClientOriginalName();
            $file->move('uploads/', $nameimg);
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=500,min_height=500',
            ]);
            DB::table('services')
                ->where('SV_ID', $id)
                ->update(['name' =>  $name,
                          'description' => $request->input('description'),
                          'SP_ID_FK' => $request->input('serviceprov'),
                          'CAT_ID_FK' => $request->input('cat'),
                          'body' => $request->input('body'),
                          'images' =>  $nameimg
                          ]);
        }
        else {
            DB::table('services')
            ->where('SV_ID', $id)
            ->update(['name' =>  $name,
                      'description' => $request->input('description'),
                      'SP_ID_FK' => $request->input('serviceprov'),
                      'CAT_ID_FK' => $request->input('cat'),
                      'body' => $request->input('body')
                      ]);
        }    
        return redirect('/services')->with('success', 'Service UPDATED !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('services')->where('SV_ID', '=', $id)->delete();
        return redirect('/services')->with('success', 'Service Removed !');
    }
}
