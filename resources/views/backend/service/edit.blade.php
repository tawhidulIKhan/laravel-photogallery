@extends('backend.layouts.app')


@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('service.index') }}">Services</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
@endbreadcrumb


<form action="{{ route('service.update',$service) }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf
    @method('PUT')
    <div class="col-lg-8 col-md-8 col-sm-12 col-12">

    <div class="bg-white p-3">

                <h3>Edit service</h3>

                {{ photon_notification($errors)}}

                <div class="form-group">
                                <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" 
                            value="{{ $service->title }}">
                            </div>

                            <div class="form-group">
                                        <label for="description">Description</label>
                                    <textarea name="description" class="form-control" rows="10">
                                        {{ $service->description }}
                                    </textarea>
                                    </div>
                                    <div class="form-group">
                                                <label for="price">Price</label>
                                            <input type="text" class="form-control" 
                                            name="price" 
                                            value="{{ $service->price }}">
                                            </div>
                                                

                                    
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group bg-white p-3">
                                <input type="submit" value="Update" class="btn btn-primary btn-block">
                            </div>


                    
                    <div class="form-group my-5 bg-white p-3">
                                <img src="{{ photon_thumbnail($service->banner) }}" width="300" height="200">
                                <label class="w-100">Banner</label>
                                <input type="file" name="thumbnail" id="thumbnail">
                                <label class="mt-3">Or thumbnail Url</label>
                                <input type="url" class="form-control mt-2" name="thumbnail_url"  id="thumbnail_url">
                             </div>
                        

                             
                        
</div>

         
    </form>

</div>
@endsection
