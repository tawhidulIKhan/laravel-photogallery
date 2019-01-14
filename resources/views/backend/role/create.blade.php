@extends('backend.layouts.app')

@section('content')


@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('role.index') }}">Role</a>
    </li>
    <li class="breadcrumb-item active">Create</li>
@endbreadcrumb




<form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf

    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            {{ photon_notification($errors)}}
            <div class="bg-white p-3">
            <h3>Create role</h3>

        <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="name">Display Name</label>
                    <input type="text" class="form-control" name="display_name">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description">
                </div>

            </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="form-group bg-white p-3">
                    <input type="submit" value="Create" class="btn btn-primary btn-block">
                </div>

                <div class="form-group bg-white p-3">
                        <label for="permission">Permission</label>
                       <select multiple class="form-control" name="permissions[]" id="permission">
                        @if (count($permissions) >0)
                            @foreach ($permissions as $permission)
                       <option value="{{ $permission->id }}">{{ $permission->display_name }}</option>
                                
                            @endforeach
                        @endif
                       </select>
                     </div>
                    </div>

                    
    </div>

    

         
    </form>

</div>
@endsection
