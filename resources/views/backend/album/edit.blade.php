@extends('backend.layouts.app')


@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('album.index') }}">Albums</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
@endbreadcrumb


    <form action="{{ route('album.update',$album) }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf
    @method('PUT')

    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="bg-white p-3">
                <h2>Edit Album</h2>

                {{ photon_notification($errors)}}
            
            
            <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $album->name }}">
                    </div>
    
        </div>
            
    </div>    
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">

            
            <div class="form-group bg-white p-3">
                    <input type="submit" value="Update" class="btn btn-primary btn-block">
                </div>

                <div class="form-group my-5 bg-white p-3">
                    <img src="{{ photon_thumbnail($album->banner) }}" width="300" height="200">
                    <label class="w-100">Banner</label>
                    <input type="file" name="banner" id="thumbnail">
                    <label class="mt-3">Or Banner Url</label>
                    <input type="url" class="form-control mt-2" name="banner_url"  id="thumbnail_url">
                 </div>
            

                        
    </div>    

    

         
    </form>

@endsection
