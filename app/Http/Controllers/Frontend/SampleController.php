<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SampleController extends Controller
{
    //

    public function index(){
        return view('welcome');
    }

    // public function contact($id='',$name=''){
    //   // return view('contact');
    //   echo $id.' '.$name;
    // }
}
