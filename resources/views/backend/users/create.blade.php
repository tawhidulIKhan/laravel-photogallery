@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('user.index') }}">Users</a>
    </li>
    <li class="breadcrumb-item active">Create</li>
@endbreadcrumb



<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf

    <div class="col-lg-8 col-md-8 col-sm-12 col-12">


            <div class="bg-white p-3">

                    <h3>Create User</h3>

                    {{ photon_notification($errors)}}

                    <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    
                        <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>

                    
            </div></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group bg-white shadow-sm p-3">
                            <input type="submit" value="Create" class="btn btn-primary btn-block">
                        </div>

                    <div class="form-group my-5 bg-white shadow-sm p-3">
                            <label for="roles">Roles</label>
                              <select multiple class="form-control" name="roles[]" id="roles">
                                @if (count($roles) > 0)
                                    @foreach($roles as $role)
                              
                              <option value="{{ $role->name }}">{{ $role->display_name }}</option>
                                 
                                    @endforeach
                                @endif
                               
                            </select>
                            </div>
                         </div>
                
                

                        </div>

         
    </form>

</div>
@endsection
