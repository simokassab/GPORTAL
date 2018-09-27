<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logs;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicename=DB::table('services')->select('SV_ID', 'name')->get();
        
       // return $serviceprov;
      // $val=$request->input('servicename');
        $servicename=DB::table('services')->select('SV_ID', 'name')->get();
        $logs=DB::table('logs')
                        ->join('services', 'services.SV_ID', '=', 'logs.SV_ID_FK')
                        ->join('serviceprov', 'services.SP_ID_FK', '=', 'serviceprov.Sp_ID')
                        ->select('logs.*', 'services.name as SV_NAME', 'serviceprov.name AS SP_NAME')->get();
        return view('reports.index')->with('logs', $logs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=$request['id'];
        $clicked=$request['clicked'];
        if($clicked=='viewed'){
            $description='User Clicked on View Service';
        }
        if($clicked=='subscribe'){
            $description='User Clicked on Subscribe';
        }
        DB::table('logs')->insert(['SV_ID_FK' => $id,
        'name' => $clicked, 
        'created_date' => Carbon::now(),
        'description' => $description,
        'active' => 1 ]);
        //return $request['clicked'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $val=$request->input('servicename');
        $servicename=DB::table('services')->select('SV_ID', 'name')->get();
        $logs=DB::table('logs')
                        ->join('services', 'services.SV_ID', '=', 'logs.SV_ID_FK')
                        ->select('logs.*', 'services.name as SV_NAME')
                        ->where('SV_ID_FK','=',$val  )->get();
        return view('reports.index')->with('servicename', $servicename)->with('logs', $logs);
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
