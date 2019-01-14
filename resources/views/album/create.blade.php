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
<form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name">
    </div>

        <div class="form-group my-5 bg-white shadow-sm p-3">
            <label>Banner</label>
            <input type="file" name="banner" id="thumbnail">
            <label class="mt-3">Banner Url</label>
            <input type="url" class="form-control mt-2" name="banner_url"  id="thumbnail_url">
         </div>


        <div class="form-group">
                <input type="submit" value="Create" class="btn btn-primary">
            </div>
         
    </form>

</div>
@endsection
