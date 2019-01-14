@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('team.index') }}">Teams</a>
    </li>
    <li class="breadcrumb-item active">Create</li>
@endbreadcrumb



<form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf

    <div class="col-lg-8 col-md-8 col-sm-12 col-12">


            <div class="bg-white p-3">

                    <h3>Create Team</h3>

                    {{ photon_notification($errors)}}

                    <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    
                        <div class="form-group">
                                <label for="description">Description</label>
                              <textarea name="description" class="form-control" rows="10"></textarea>
                            </div>
                    
                    
            </div></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group bg-white shadow-sm p-3">
                            <input type="submit" value="Create" class="btn btn-primary btn-block">
                        </div>

                    <div class="form-group my-5 bg-white shadow-sm p-3">
                            <label>Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail">
                            <label class="mt-3">Or Thumbnail Url</label>
                            <input type="url" class="form-control mt-2" name="thumbnail_url"  id="thumbnail_url">
                         </div>
                
                

                        </div>

         
    </form>

</div>
@endsection
