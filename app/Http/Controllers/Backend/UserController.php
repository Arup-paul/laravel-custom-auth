<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index(){
        echo "Showing User List";
    }

    public function show($id,Request $request){

        echo "Showing details of user id: ".$id."</br>";
        echo $request->ip()."</br>";
        echo $request->userAgent()."</br>";
        var_dump($request->ips())."</br>";
        echo "</br>";
        var_dump($request->all())."</br>";
        echo "</br>";
        var_dump($request->name)."</br>";
        echo "</br>";
        echo $request->input('age')."</br>";
        echo "</br>";
        echo $request->has('age')."</br>";
        echo "</br>";
       var_dump($request->has('age'))."</br>";
        echo "</br>";

        $age = $request->has('age') ? $request->input('age'):1;
        echo $age;
        echo "</br>";

        $page = $request->input('page') ??  1;
        echo $page;  
    }


}
