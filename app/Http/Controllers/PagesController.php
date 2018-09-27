<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function serviceprovider (){
        return view('serviceprovider.index');
    }
    public function services (){
        return view('services.index');
    }
    public function categories (){
        return view('categories.index');
    }
    public function reports (){
        return view('reports.index');
    }
}
