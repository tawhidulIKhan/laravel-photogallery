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
<form action="{{ route('album.update',$album) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value="{{ $album->name }}">
    </div>


    {{-- <div class="form-group">
        <img src="{{ photon_thumbnail($album->banner) }}" width="300" height="200">

        <label>Banner</label>
        <input type="file" name="banner" id="thumbnail">
        <label class="mt-3">Banner Url</label>
        <input type="url" class="form-control mt-2" name="banner_url"  id="thumbnail_url">
     </div>
 --}}
        <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
         
    </form>

</div>
@endsection
