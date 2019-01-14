@extends('backend.layouts.app')

@section('content')


@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('photo.index') }}">Photo</a>
    </li>
    <li class="breadcrumb-item active">Create</li>
@endbreadcrumb


<form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf

    <div class="col-lg-8 col-md-8 col-sm-12 col-12">


            <div class="bg-white p-3">

            <h3>Add Photo</h3>
            {{ photon_notification($errors)}}
                <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    
                        <div class="form-group">
                                <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="10"></textarea>
                            </div>
                    
            </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
    
            <div class="form-group bg-white p-3">
                    <input type="submit" value="Create" class="btn btn-primary btn-block">
                </div>
            
                <div class="form-group bg-white p-3">
                        <label for="album">Album</label>
                        <select name="album_id" class="form-control">
                            @if (count($albums)>0)
                                @foreach($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
        
                    

                <div class="form-group my-5 bg-white p-3">
                    <label class="w-100">Photo</label>
                    <input type="file" name="image" id="thumbnail">
                    <label class="mt-3">Or Photo Url</label>
                    <input type="url" class="form-control mt-2" name="photo_url"  id="thumbnail_url">
                 </div>
            
            
            
                
    </div>

         
    </form>

</div>
@endsection
