@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('photo.index') }}">Photo</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
@endbreadcrumb

<form action="{{ route('photo.update',$photo) }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf
    @method('PUT')

    <div class="col-lg-8 col-md-8 col-sm-12 col-12">

                <div class="bg-white p-3">

                                <h2>Edit photo</h2>

                                {{ photon_notification($errors)}}
                                

                                <div class="form-group">
                                                <label for="title">Title</label>
                                            <input type="text" 
                                            class="form-control" name="title" 
                                            value="{{ $photo->title }}">
                                            </div>

                                            
                                            <div class="form-group">
                                                        <label for="description">Description</label>
                                              
                                                    <textarea name="description" id="description" 
                                                    class="form-control" rows="10">
                                                    {{ $photo->description }}
                                                </textarea>
                                                    </div>
        
                </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="form-group bg-white p-3">
                                        <input type="submit" value="Update" class="btn btn-primary btn-block">
                                    </div>
        
<div class="form-group  bg-white p-3">
  <label for="">Album</label>
  <select class="form-control" name="album_id" >
                <option selected>Select one</option>
                @if (count($albums) > 0)

                        @foreach ($albums as $album)

  <option {{ photon_selected($photo->album_id,$album->id) }} value="{{ $album->id }}">{{ $album->name }}</option>
                        @endforeach
                    
                @endif
        </select>
</div>        
                            
                            <div class="form-group my-5 bg-white p-3">
                                        <img src="{{ photon_thumbnail($photo->image) }}" width="300" height="200">
                                        <label class="w-100">image</label>
                                        <input type="file" name="image" id="thumbnail">
                                        <label class="mt-3">Or image Url</label>
                                        <input type="url" class="form-control mt-2" 
                                        name="thumbnail_url"  id="image_url">
                                     </div>
                                
        
        </div>


         
    </form>

@endsection
