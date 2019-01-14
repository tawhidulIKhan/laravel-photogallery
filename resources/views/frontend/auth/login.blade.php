@extends('frontend.layouts.app')
@section('content')


    <!-- Page Content -->
    <div class="container my-5">

      <div class="row">
          <div class="col-8 m-auto">

            {{ photon_notification($errors) }}

            <h4 class="mb-5 mt-5 font-weight-bold">Login</h4>


            <form action="{{ route('login') }}" method="post" class="shadow p-5 bg-white my-5">

            @csrf


              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" 
                placeholder="Type Email" aria-describedby="helpId">
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" 
                aria-describedby="helpId" placeholder="Enter Password">
              </div>

            
              <div class="form-check form-check-inline w-100 mb-3">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember"> Remember me
                </label>
              </div>

              <button type="submit" class="btn btn-primary text-white text-uppercase">Login</button>

            <a href="{{ route('passwordResetToken') }}" class="ml-2">forgot your password?</a>
            </form>
          </div>
      </div>
    </div>
        @endsection
