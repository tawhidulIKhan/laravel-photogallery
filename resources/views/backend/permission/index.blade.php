@extends('backend.layouts.app')


@section('content')

@breadcrumb()
    <li class="breadcrumb-item active">Permissions</li>
@endbreadcrumb


<div class="bg-white p-3">
<h3>All Permissions</h3>


{{ photon_notification($errors)}}

@if (count($permissions) > 0 )

    <table class="table table-bordered text-center mt-4">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>details</th>
        </tr>

            @foreach ($permissions as $permission)
            <tr>
                    <td>
                    {{ $permission->id }}
                </td>

                <td>
                    {{ $permission->display_name }}
                </td>

                <td>
                    {{ $permission->description }}
                </td>

                <td>
                    <a href="{{ route('permission.show',$permission->name) }}" class="btn btn-success">Details</a>
                    </td>
                </tr>
                        
            @endforeach
    </table>
    @else
    
    <p class="bg-info">No permission found yet</p>

    @endif
</div>

@endsection
