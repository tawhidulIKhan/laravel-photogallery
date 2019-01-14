@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('user.index') }}">users</a>
    </li>
    <li class="breadcrumb-item active">Show</li>
@endbreadcrumb


<div class="bg-white p-3">
<h3>Details user</h3>

{{ photon_notification($errors) }}

<table class="table table-bordered text-center">
        <tr>
            <th>Id</th>
            
            <td>
                    {{ $user->id }}
                </td>
    
        </tr>

    <tr>
            <th>Name</th>
            
            <td>
                    {{ $user->name }}
                </td>
    
        </tr>

        <tr>
                <th>Email</th>
                
                <td>
                    {{ $user->email }}
                </td>
        
            </tr>

            
                <tr>
                    <th>Email Verification</th>
                    
                    <td>
                    <p>{{ $user->email_verified_at ? 'verified' : 'not verified' }}</p>     
                    </td>
            
                </tr>
                <tr>
                    <th>Roles</th>
                    
                    <td>
                        @if (count($user->roles) > 0 )
                            @foreach ($user->roles as $role)
                                {{ $role->display_name}}
                            @endforeach
                        @else
                            <span class="text-danger">No role found yet</span>
                        @endif
                    </td>
            
                </tr>
    
        <tr>
            
                <th>Actions</th>

        <td class="d-flex justify-content-center">

        <form action="{{ route('user.destroy',$user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Del">
        </form>
            <a href="{{ route('user.edit',$user->id) }}" class="btn btn-success ml-3">Edit</a>

        </td>


                    </tr>
                        
    </table>

</div>
@endsection
