@extends('master')

@section('content')
<h2>Register an account</h2>
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
@if(session()->has('msg'))
<div class="alert alert-success">
    {{session('msg')}}
</div>
@endif
<form action="{{route('registers')}}" method="post" enctype="multipart/form-data">
    @csrf

   <div class="form-group">
       <label for="name">Name</label>
   <input type="text" value="{{old('name')}}" class="form-control" name="name" placeholder="Enter name">
   </div>

   <div class="form-group">
    <label for="email">Email</label>
    <input type="email" value="{{old('email')}}" class="form-control" name="email" placeholder="Enter email">
</div>

<div class="form-group">
    <label for="name">Password</label>
    <input type="password" value="{{old('password')}}" class="form-control" name="password" placeholder="Enter Password">
</div>

<div class="form-group">
    <label for="name">Photo</label>
    <input type="file" placeholder="Upload photo" class="form-control" name="photo">
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection
