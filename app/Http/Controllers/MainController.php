<?php

namespace App\Http\Controllers;

use App\Filter;
use App\Pad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        return view('home');
    }

    public function contacts(){
        return view('contacts');
    }

    public function search(Request $request){
        $s =  $request->search ;
        $s = preg_replace('/^0{1,}||[^a-zA-Z0-9]/', '', $s);

       

          $filters = Filter::where(DB::raw("REGEXP_REPLACE( auto_spare, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->orWhere(DB::raw("REGEXP_REPLACE(sct, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->orWhere(DB::raw("REGEXP_REPLACE(nrg, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->orWhere(DB::raw("REGEXP_REPLACE(filtron, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->orWhere(DB::raw("REGEXP_REPLACE(mann, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->orWhere(DB::raw("REGEXP_REPLACE(oe, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->get();

          $pads = Pad::where(DB::raw("REGEXP_REPLACE( auto_spare, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->orWhere(DB::raw("REGEXP_REPLACE(sct, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->orWhere(DB::raw("REGEXP_REPLACE(nrg, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->orWhere(DB::raw("REGEXP_REPLACE(ferodo, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->orWhere(DB::raw("REGEXP_REPLACE(trw, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->orWhere(DB::raw("REGEXP_REPLACE(oe, '[^a-zA-Z0-9]+', '')"),'like', "%$s%") 
          ->get();
          

        if (count($filters) !== 0) {
            $parts = $filters;
        }else {
            $parts = $pads;
        }

           return view('search' , compact('parts'));


    }

}
