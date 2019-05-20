@extends('layouts.app')
@section('content')

        
<div class="container">
        <a href="{{route('home')}}">Home</a>
        <h1>Professor</h1>
</div>        
<div class="container">
<form>
        <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
                <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>      

@endsection
