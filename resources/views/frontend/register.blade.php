@extends('master')


@section('content')
  <h3 class="text-center text-info">Register Your Account</h3>
  @if ($errors->any())
 <div class="alert alert-danger">
       @if ($errors->count() == 1)
           {{$errors->first()}}
       @else
        <ul>
            @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        </ul>
        @endif
 </div>

@endif
@if (session()->has('msg'))
<div class="alert alert-{{session('type')}}">
     {{session('msg')}}
</div>
@endif
<form action="{{route('registration')}}" method="post"  enctype="multipart/form-data">
    @csrf

   <div class="form-group">
       <label for="name">Name</label>
   <input type="text"  class="form-control" value="{{old('name')}}" name="name" placeholder="Enter name">
   </div>

   <div class="form-group">
    <label for="email">Email</label>
    <input type="email"  class="form-control" value="{{old('email')}}" name="email" placeholder="Enter email">
</div>

<div class="form-group">
    <label for="name">Password</label>
    <input type="password"  class="form-control"  name="password" placeholder="Enter Password">
</div>

<div class="form-group">
    <label for="name">Confirm Password</label>
    <input type="password"  class="form-control"  name="password_confirmation" placeholder="Enter Confirm Password">
</div>



<button type="submit" class="btn btn-primary">Register</button>

</form>




@endsection
