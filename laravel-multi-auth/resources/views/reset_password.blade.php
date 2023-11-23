@extends('home')
@section('content')
<div class="row  ">
<h3>Reset Password</h3>
    <div class="col-md-8  m-auto ">
        <div class="card p-5 my-5 ">
            <form class="my-5" method="POST" action="{{ route('reset.paassword.submit') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" >
               </div>
                <div class="mb-3">
                    <label for="retype_password" class="form-label">Retype Password</label>
                    <input type="password" class="form-control" id="retype_password" name="retype_password">
               </div>
                <div class="mb-3">
                   <input type="submit" value="Update">
                </div>



            </form>
        </div>
    </div>
</div>
@endsection
