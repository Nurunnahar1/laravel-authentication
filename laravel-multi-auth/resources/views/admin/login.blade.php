<div class="container ">
    <div class="row">


            <div class="col-md-8  m-auto ">
                <div class="card p-5 my-5 ">
                    <form class="my-5" action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" >
                       </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                       </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>


 </div>
