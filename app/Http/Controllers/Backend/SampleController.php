<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class SampleController extends Controller
{
    //

    public function index(){
        $data = [];

        $data['site_title'] = "RioTheme";
        $data['current_time'] = date('d-m-Y , h:i:s');
        $data['links'] = [
          'facebook' => 'https://facebook.com',
          'google' => 'https://google.com',
          'twitter' => 'https://twitter.com',
          'Youtube' => 'https://youtube.com',
          'Linedlin' => 'https://linkdlin.com',
        ];
        return view('index',$data);
    }


    public function posts(){

        $data = [];

        $data['site_title'] = "RioTheme";
        $data['current_time'] = date('d-m-Y , h:i:s');
        $data['links'] = [
          'facebook' => 'https://facebook.com',
          'google' => 'https://google.com',
          'twitter' => 'https://twitter.com',
          'Youtube' => 'https://youtube.com',
          'Linedlin' => 'https://linkdlin.com',
        ];

        $data['post'] = [
           'title'=> 'This is simple post',
           'created_at'=> 'January 1, 2014',
           'description'=> '<p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
           <hr>
           <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
           <blockquote>
             <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
           </blockquote>
           <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
           <h2>Heading</h2>
           <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
           <h3>Sub-heading</h3>
           <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
           <pre><code>Example code block</code></pre>
           <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
           <h3>Sub-heading</h3>
           <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
           <ul>
             <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
             <li>Donec id elit non mi porta gravida at eget metus.</li>
             <li>Nulla vitae elit libero, a pharetra augue.</li>
           </ul>
           <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
           <ol>
             <li>Vestibulum id ligula porta felis euismod semper.</li>
             <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
             <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
           </ol>
           <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p> '
        ];

        return view('posts',$data);



    }

    public function welcome(){

        $data = [];

        $data['day'] = "Friday";
        $data['links'] = [
          'facebook' => 'https://facebook.com',
          'google' => 'https://google.com',
          'twitter' => 'https://twitter.com'
        ];

        return view('welcome',$data);
    }

    public function showRegistrationForm(){

        $data = [];

        // $data['site_title'] = "RioTheme";
        // $data['current_time'] = date('d-m-Y , h:i:s');
        // $data['links'] = [
        //   'facebook' => 'https://facebook.com',
        //   'google' => 'https://google.com',
        //   'twitter' => 'https://twitter.com',
        //   'Youtube' => 'https://youtube.com',
        //   'Linedlin' => 'https://linkdlin.com',
        // ];
        return view('register',$data);
    }

    public function processRegistration(Request $request){

        //return  $request->all();  //all value return
        //return  $request->only(['email','name']); // select value return
        //return  $request->except(['_token']); //select value no return

        //input method
        // echo $request->input('name');
        // echo "</br>";
        // echo $request->input('email');
        // echo "</br>";
        // echo $request->input('password');

        //
       // echo $request->name;

       //
       //echo request()->name; //Request dependency


      //validation



    //  $validatedData = $request->validate( [
    //     'name' =>'required|min:4',
    //     'email'=> 'required|email',
    //     'password'=>'required|min:5'
    // ] );
// echo $photo->getClientOriginalname();
    // echo $photo->getClientOriginalExtension();
    // echo $photo->getClientSize();


       $Validator = Validator::make($request->all(),[
        'name' =>'required|min:4',
        'email'=> 'required|email',
        'password'=>'required|min:5',
        'photo'=>'required|image|max:140'
       ]);


       if($Validator->fails()){
              return redirect()->back()->withErrors($Validator)->withInput( );
       }

       $photo = $request->file('photo');
       $file_name = uniqid('photo_',true).bin2hex(10).'.'. $photo->getClientOriginalExtension();
       if($photo->isValid()){
          $photo->storeAs('images',$file_name);
       }

       session()->flash('msg','succesful registration');
      return redirect()->back();







    }

}
