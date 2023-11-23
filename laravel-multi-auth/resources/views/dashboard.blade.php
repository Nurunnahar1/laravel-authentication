@extends('home')
@section('content')
<div class="row  ">

 <h1>Dashboard</h1>
 <p>Hi {{ Auth::guard('web')->user()->name }}, Welcome to Dashboard! </p>
</div>
@endsection
