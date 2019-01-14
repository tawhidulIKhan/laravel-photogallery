@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('contactinfo.index') }}">Contact Info</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
@endbreadcrumb
    <form action="{{ route('contactinfo.update',$contactinfo) }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf
    @method('PUT')
    <div class="col-lg-8 col-md-8 col-sm-12 col-12">


            <div class="bg-white p-3">

                    <h3>Edit Contcat Info</h3>

                    {{ photon_notification($errors)}}

                    <div class="form-group">
                            <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $contactinfo->title }}">
                        </div>
                    
                        <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="10">
                                    {{ $contactinfo->description }}
                                </textarea>
                     </div>
                    
            </div></div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    
                    <div class="form-group bg-white p-3">
                            <input type="submit" value="Update" class="btn btn-primary btn-block">
                        </div>


                    

                                
            </div>
        
         
    </form>
</div>
</div></div>

@endsection
