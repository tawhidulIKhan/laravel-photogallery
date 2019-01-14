@extends('frontend.layouts.app')
@section('content')


    <!-- Page Content -->
    <div class="container my-5">
        <div class="row">

            <div class="col-7 m-auto">
                {{ photon_notification($errors) }}
                <div class="card border-light">
                            <div class="card-body">
                              <h4 class="card-title">Your email is not verified</h4>
                              <p class="card-text">
                              <form action="{{ route('verifyAgain') }}" method="post">
                                      @csrf
                                      <input type="text" name="email" class="form-control mb-3">
                                      <input type="submit" value="Resent verification" 
                                      class="btn btn-outline-primary">
                                  </form>
                              </p>
                            </div>
                          </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    @endsection
