@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item active">User Settings</li>
@endbreadcrumb



    <div class="bg-white p-3">
        {{ photon_notification($errors)}}
        <div class="row">
            <div class="col-md-6 col-12">
                    <h3>User Details</h3>
                    <table class="table">
                        <tr>
                                <th>Name</th>
                        <td>{{ auth()->user()->name }}</td>
                            </tr>
    
                            <tr>
                                    <th>Email</th>
                            <td>{{ auth()->user()->email }}</td>
                                </tr>
                    </table>
            </div>
            <div class="col-md-6 col-12">

            <form action="{{ route('user.update') }}" method="POST" class="shadow p-4">
                @csrf
                @method('PUT')
                        <h3>Edit Settings</h3>
                        <div class="form-group">
                      <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}">
                    </div>

                    <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}">
                          </div>

                          <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                              </div>

                              <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                  </div>
            
                          <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                              </div>
          
                </form>

            </div>
        </div>
    </div>

@endsection
