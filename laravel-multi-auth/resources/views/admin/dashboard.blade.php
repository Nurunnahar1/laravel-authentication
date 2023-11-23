






@extends('admin.app')
@section('content')
<div class="row  ">

    <h1>Dashboard - Admin</h1>
    <p>Hi {{ Auth::guard('admin')->user()->name }}, Welcome to Dashboard! </p>
   </div>

@endsection
