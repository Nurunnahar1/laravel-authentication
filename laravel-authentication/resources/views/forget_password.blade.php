@extends('home')
@section('content')
<div class="row  ">
    <h3>Forget Password</h3>
    <div class="col-md-8  m-auto ">
        <div class="card p-5 my-5 ">
            <form class="my-5" method="POST" action="{{ route('forget.paassword') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" >
               </div>
                <div class="mb-3">
                   <input type="submit" value="Submit">
                   <br>
                   <a href="{{ route('login.page') }}">Back to Login Page</a>
               </div>

            </form>
        </div>
    </div>
</div>
@endsection
