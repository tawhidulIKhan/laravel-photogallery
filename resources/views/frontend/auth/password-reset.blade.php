@extends('frontend.layouts.app')
@section('content')


    <!-- Page Content -->
    <div class="container my-5">

      <div class="row">
          <div class="col-8 m-auto">

            {{ cms_notification($errors) }}

            <h4 class="mt-3">Reset Your Password</h4>


            <form action="{{ route('passwordReset') }}" method="post" class="shadow p-4 bg-white my-5">

            @csrf

            <input type="hidden" value="{{ $token }}" name="token">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" 
              placeholder="Type Email" aria-describedby="helpId" value="{{ $email }}">
              </div>

              <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" class="form-control" 
                  placeholder="Type password" aria-describedby="helpId">
                  </div>

                  <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="cpassword" class="form-control" 
                      placeholder="Confirm password" aria-describedby="helpId">
                      </div>
            
              <button type="submit" class="btn btn-primary">Reset Password</button>
       
            </form>
          </div>
      </div>
    </div>
        @endsection
