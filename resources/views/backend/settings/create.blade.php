@extends('backend.layouts.app')

@section('content')


@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('settings.index') }}">setting</a>
    </li>
    <li class="breadcrumb-item active">Create</li>
@endbreadcrumb




<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf

    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            {{ photon_notification($errors)}}
            <div class="bg-white p-3">
            <h3>Create setting</h3>

        <div class="form-group">
                    <label for="key">Key</label>
                    <input type="text" class="form-control" name="key" placeholder="site_title" required>
                </div>
                <div class="form-group">
                    <label for="name">Display Name</label>
                    <input type="text" class="form-control" placeholder="Site Title" name="display_name" required>
                </div>

                <div class="form-group">
                        <label for="value">Value</label>
                        <input type="text" class="form-control" name="value" placeholder="Photon" required>
                    </div>

                    
            </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="form-group bg-white p-3">
                    <input type="submit" value="Create" class="btn btn-primary btn-block">
                </div>

         
                    </div>

                    
    </div>

    

         
    </form>

</div>
@endsection
