@extends('backend.layouts.app')

@section('content')
@breadcrumb()
    <li class="breadcrumb-item active">Photo</li>
@endbreadcrumb


<div class="bg-white p-3">
        <h3>All Photos</h3>
        {{ photon_notification($errors)}}
        
    @if (count($photos) > 0 )
    <table class="table table-bordered text-center mt-4">
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Title</th>
            <th>details</th>
        </tr>

            @foreach ($photos as $photo)
            <tr>
                    <td>
                    {{ $photo->id }}
                </td>
                <td>
                        <img src="{{ photon_thumbnail($photo->image) }}" width="50" height="50">
                        </td>
        
                <td>
                    {{ $photo->title }}
                </td>

                    <td>
                    <a href="{{ route('photo.show',$photo->slug) }}" class="btn btn-success">Details</a>
                    </td>
                </tr>
                        
            @endforeach
    </table>

    {{ $photos->links()}}
    @else
    
    <p class="bg-info">No photo found yet</p>

    @endif

</div>
@endsection
