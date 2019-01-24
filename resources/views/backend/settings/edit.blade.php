@extends('backend.layouts.app')


@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('settings.index') }}">settings</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
@endbreadcrumb


    <form action="{{ route('settings.update',$setting->slug) }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf
    @method('PUT')

    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="bg-white p-3">
                <h2>Edit setting</h2>

                {{ photon_notification($errors)}}
            
            
            <div class="form-group">
                        <label for="key">Key</label>
                    <input type="text" class="form-control" name="key" 
                    value="{{ $setting->key }}">
                    </div>

                    <div class="form-group">
                        <label for="display_name">Display Name</label>
                    <input type="text" class="form-control" name="display_name" 
                    value="{{ $setting->display_name }}">
                    </div>

                    <div class="form-group">
                        <label for="value">value</label>
                    <input type="text" class="form-control" name="value" 
                    value="{{ $setting->value }}">
                    </div>

    
        </div>
            
    </div>    
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">

            
            <div class="form-group bg-white p-3">
                    <input type="submit" value="Update" class="btn btn-primary btn-block">
                </div>

            

                        
    </div>    

    

         
    </form>

@endsection
