@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('team.index') }}">Teams</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
@endbreadcrumb


    <form action="{{ route('team.update',$team) }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf
    @method('PUT')
    <div class="col-lg-8 col-md-8 col-sm-12 col-12">


            <div class="bg-white p-3">

                    <h3>Edit team</h3>

                    {{ photon_notification($errors)}}

                    <div class="form-group">
                            <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $team->name }}">
                        </div>
                    
                        <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="10">
                                    {{ $team->description }}
                                </textarea>
                     </div>
                    
            </div></div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    
                    <div class="form-group bg-white p-3">
                            <input type="submit" value="Update" class="btn btn-primary btn-block">
                        </div>


                <div class="form-group bg-white p-3">
                            <img src="{{ photon_thumbnail($team->thumbnail) }}" width="300" height="200">
                            <label class="w-100">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail">
                            <label class="mt-3">Or thumbnail Url</label>
                            <input type="url" class="form-control mt-2" name="thumbnail_url"  id="thumbnail_url">
                         </div>
                    

                                
            </div>
        
         
    </form>
</div>
</div></div>

@endsection
