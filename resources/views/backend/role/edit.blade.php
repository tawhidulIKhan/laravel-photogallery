@extends('backend.layouts.app')


@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('role.index') }}">roles</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
@endbreadcrumb


    <form action="{{ route('role.update',$role->name) }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf
    @method('PUT')

    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="bg-white p-3">
                <h2>Edit role</h2>

                {{ photon_notification($errors)}}
            
            
            <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                    </div>

                    <div class="form-group">
                        <label for="display_name">Display Name</label>
                    <input type="text" class="form-control" name="display_name" value="{{ $role->display_name }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $role->description }}">
                    </div>

                    <div class="form-group">
                        <label for="permission">Permissions</label>
                        <select name="permissions[]" class="form-control" multiple id="permission">

                            @if (count($permissions) > 0)
                                @foreach ($permissions as $permission)
                        <option value="{{ $permission->name }}" {{ in_array($permission['id'],$role->permissions->pluck('id')->toArray()) ? 'selected' : '' }} >
                            {{ $permission->display_name }}
                        </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
    
        </div>
            
    </div>    
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">

            
            <div class="form-group bg-white p-3">
                    <input type="submit" value="Update" class="btn btn-primary btn-block">
                </div>

            

                        
    </div>    

    

         
    </form>

@endsection
