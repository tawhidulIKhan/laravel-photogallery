@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('user.index') }}">users</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
@endbreadcrumb


    <form action="{{ route('user.update',$user) }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf
    @method('PUT')
    <div class="col-lg-8 col-md-8 col-sm-12 col-12">


            <div class="bg-white p-3">

                    <h3>Edit user</h3>

                    {{ photon_notification($errors)}}

                    <div class="form-group">
                    <p>{{ $user->name }}</p>
                    </div>

                    <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" 
                            name="email" value="{{ $user->email }}">
                       </div>

                       
                            <div class="form-group">
                                    <label for="roles">Roles</label>
                                    <select multiple class="form-control" 
                                    name="roles[]" id="roles">
                                    @if (count($roles) >0)

                                    @foreach ($roles as $role)

                            <option {{ 
                                in_array($role->id,$user->roles->pluck('id')->toArray()) ? 'selected' : ''
                             }} 
                             value="{{ $role->id }}">{{ $role->display_name }}</option>
                                        
                                    @endforeach
                                        
                                    @endif
                              </select>
                            </div>
                       
                       
            </div></div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    
                    <div class="form-group bg-white p-3">
                            <input type="submit" value="Update" class="btn btn-primary btn-block">
                        </div>


                    

                                
            </div>
        
         
    </form>
</div>
</div></div>

@endsection
