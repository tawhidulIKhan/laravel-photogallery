@extends('backend.layouts.app')


@section('content')

@breadcrumb()
    <li class="breadcrumb-item active">roles</li>
@endbreadcrumb


<div class="bg-white p-3">
<h3>All roles</h3>

{{ photon_notification($errors)}}

@if (count($roles) > 0 )

    <table class="table table-bordered text-center mt-4">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>details</th>
        </tr>

            @foreach ($roles as $role)
            <tr>
                    <td>
                    {{ $role->id }}
                </td>

                <td>
                    {{ $role->display_name }}
                </td>

                <td>
                    {{ $role->description }}
                </td>

                <td>
                    <a href="{{ route('role.show',$role->name) }}" class="btn btn-success">Details</a>
                    </td>
                </tr>
                        
            @endforeach
    </table>
    @else
    
    <p class="bg-info">No role found yet</p>

    @endif
</div>

@endsection
