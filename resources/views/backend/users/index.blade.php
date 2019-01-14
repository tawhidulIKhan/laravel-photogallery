@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item active">users</li>
@endbreadcrumb



<div class="bg-white p-3">
        <h3>All users</h3>
        {{ photon_notification($errors)}}

    @if (count($users) > 0 )
    <table class="table table-bordered text-center">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Verified</th>
            <th>Role</th>
            <th>Details</th>
        </tr>

            @foreach ($users as $user)
            <tr>
                    <td>
                    {{ $user->id }}
                </td>
                <td>
                    {{ $user->name }}
                </td>
        
                <td>
                    {{ $user->email }}
                </td>

                <td>
                        {{ $user->email_verified_at ? 'verified' : 'not verified' }}
                    </td>

                    <td>
                        @if (count($user->roles)> 0)
                            @foreach ($user->roles as $role)
                                {{ $role->display_name}}
                            @endforeach
                        @else
                        <span class="text-danger">No role set yet</span>    
                        @endif
                    </td>

                    <td>
                    <a href="{{ route('user.show',$user->id) }}" class="btn btn-success">Details</a>
                    </td>
                </tr>
                        
            @endforeach
    </table>
    @else
    
    <p class="bg-info">No album found yet</p>

    @endif

</div>
@endsection
