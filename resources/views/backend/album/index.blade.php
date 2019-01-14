@extends('backend.layouts.app')


@section('content')

@breadcrumb()
    <li class="breadcrumb-item active">Albums</li>
@endbreadcrumb


<div class="bg-white p-3">
<h3>All Albums</h3>


{{ photon_notification($errors)}}

@if (count($albums) > 0 )

    <table class="table table-bordered text-center mt-4">
        <tr>
            <th>Id</th>
            <th>Banner</th>
            <th>Name</th>
            <th>details</th>
        </tr>

            @foreach ($albums as $album)
            <tr>
                    <td>
                    {{ $album->id }}
                </td>
                <td>
                        <img src="{{ photon_thumbnail($album->banner) }}" width="50" height="50">
                        </td>
        
                <td>
                    {{ $album->name }}
                </td>

                    <td>
                    <a href="{{ route('album.show',$album->slug) }}" class="btn btn-success">Details</a>
                    </td>
                </tr>
                        
            @endforeach
    </table>
    @else
    
    <p class="bg-info">No album found yet</p>

    @endif
</div>

@endsection
