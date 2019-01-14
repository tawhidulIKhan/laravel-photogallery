@extends('layouts.app')

@section('content')


<div class="container">
<h2>Create album</h2>

@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
    
@endif

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
    
@endif
    @if (count($albums) > 0 )
    <table class="table table-bordered text-center">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Banner</th>
            <th>details</th>
        </tr>

            @foreach ($albums as $album)
            <tr>
                    <td>
                    {{ $album->id }}
                </td>
    
                <td>
                    {{ $album->name }}
                </td>

                    <td>
                    <img src="{{ asset('storage/images/'.$album->banner) }}" width="100" height="100">
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
