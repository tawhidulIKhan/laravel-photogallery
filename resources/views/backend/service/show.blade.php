@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('service.index') }}">Services</a>
    </li>
    <li class="breadcrumb-item active">Show</li>
@endbreadcrumb


<div class="container">
<h2>Service Details</h2>

{{ photon_notification($errors) }}
    <table class="table table-bordered text-center">
        <tr>
            <th>Id</th>
            
            <td>
                    {{ $service->id }}
                </td>
    
        </tr>

    <tr>
            <th>Title</th>
            
            <td>
                    {{ $service->title }}
                </td>
    
        </tr>

        <tr>
                <th>Image</th>
                
                <td>
                        <img src="{{ photon_thumbnail($service->thumbnail) }}" width="100" height="100">
                    </td>
        
            </tr>
    

            <tr>
                    <th>Description</th>
                    
                    <td>
                        {{ $service->description }}
                    </td>
            
                </tr>


                <tr>
            
                <th>Actions</th>

        <td class="d-flex justify-content-center">

        <form action="{{ route('service.destroy',$service->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Del">
        </form>
            <a href="{{ route('service.edit',$service->slug) }}" class="btn btn-success ml-3">Edit</a>

        </td>


                    </tr>
                        
    </table>

</div>
@endsection
