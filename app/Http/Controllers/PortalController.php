<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PortalController extends Controller
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
            ->limit(4)->get();
        $latestservices = DB::table('services')
            ->join('serviceprov', 'services.SP_ID_FK', '=', 'serviceprov.SP_ID')
            ->join('categories', 'services.CAT_ID_FK', '=', 'categories.CAT_ID')
            ->select('services.*', 'serviceprov.name as SP_NAME', 'categories.name as CAT_NAME')
            ->orderBy('created_date', 'desc')->get();
            $cat=DB::table('categories')->select('*')->orderBy('CAT_ID', 'asc')->limit(3)->get();

            $topservices= DB::table('logs')
                        ->join('services', 'services.SV_ID', '=', 'logs.SV_ID_FK')
                        ->select('services.name','SV_ID_FK', DB::raw('count(LOG_ID) as count_subscribe'))
                        ->where('logs.name', '=', 'subscribe')
                        ->groupBy('services.name','SV_ID_FK')
                        ->orderBy('count_subscribe', 'desc')->get();
       return view('portal')->with('services', $services)->with('latestservices', $latestservices)->with('catlist', $cat)->with('topservices', $topservices);
    }

    public function getSvByCatID($id){
        $cat = DB::table('services')
        ->join('categories', 'services.CAT_ID_FK', '=', 'categories.CAT_ID')
        ->select('services.*', 'categories.name as CAT_NAME')
        ->where('categories.CAT_ID', $id)
        ->orderBy('created_date', 'desc')->get();
        return $cat;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = DB::table('services')
        ->join('serviceprov', 'services.SP_ID_FK', '=', 'serviceprov.SP_ID')
        ->join('categories', 'services.CAT_ID_FK', '=', 'categories.CAT_ID')
        ->select('services.*', 'serviceprov.name as SP_NAME', 'categories.name as CAT_NAME')
        ->where('SV_ID',$id)->get();
        
        return view('viewservice')->with('services', $services);
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
