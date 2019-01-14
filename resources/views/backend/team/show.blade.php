@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('team.index') }}">Teams</a>
    </li>
    <li class="breadcrumb-item active">Show</li>
@endbreadcrumb


<div class="bg-white p-3">
<h3>Details team</h3>

{{ photon_notification($errors) }}

<table class="table table-bordered text-center">
        <tr>
            <th>Id</th>
            
            <td>
                    {{ $team->id }}
                </td>
    
        </tr>

    <tr>
            <th>Name</th>
            
            <td>
                    {{ $team->name }}
                </td>
    
        </tr>

        <tr>
                <th>Thumbnail</th>
                
                <td>
                        <img src="{{ photon_thumbnail($team->thumbnail) }}" width="100" height="100">
                    </td>
        
            </tr>

            
            <tr>
                    <th>Description</th>
                    
                    <td>
                    <p>{{ $team->description }}</p>     
                    </td>
            
                </tr>
    
        <tr>
            
                <th>Actions</th>

        <td class="d-flex justify-content-center">

        <form action="{{ route('team.destroy',$team) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Del">
        </form>
            <a href="{{ route('team.edit',$team) }}" class="btn btn-success ml-3">Edit</a>

        </td>


                    </tr>
                        
    </table>

</div>
@endsection
