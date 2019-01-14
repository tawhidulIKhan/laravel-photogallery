@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item active">Teams</li>
@endbreadcrumb



<div class="bg-white p-3">
        <h3>All Teams</h3>
        {{ photon_notification($errors)}}

    @if (count($teams) > 0 )
    <table class="table table-bordered text-center">
        <tr>
            <th>Id</th>
            <th>Thumbnail</th>
            <th>Name</th>
            <th>Description</th>
            <th>details</th>
        </tr>

            @foreach ($teams as $team)
            <tr>
                    <td>
                    {{ $team->id }}
                </td>
                <td>
                        <img src="{{ photon_thumbnail($team->thumbnail) }}" width="50" height="50">
                        </td>
        
                <td>
                    {{ $team->name }}
                </td>

                <td>
                        {{ $team->description }}
                    </td>

                    <td>
                    <a href="{{ route('team.show',$team->slug) }}" class="btn btn-success">Details</a>
                    </td>
                </tr>
                        
            @endforeach
    </table>
    @else
    
    <p class="bg-info">No album found yet</p>

    @endif

</div>
@endsection
