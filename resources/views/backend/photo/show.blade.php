@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('photo.index') }}">Photo</a>
    </li>
    <li class="breadcrumb-item active">Show</li>
@endbreadcrumb


<div class="bg-white p-3">

        <h3>Album Details</h3>
    
    {{ photon_notification($errors) }}

    <table class="table table-bordered text-center">
        <tr>
            <th>Id</th>
            
            <td>
                    {{ $photo->id }}
                </td>
    
        </tr>

    <tr>
            <th>Title</th>
            
            <td>
                    {{ $photo->title }}
                </td>
    
        </tr>

        <tr>
                <th>Image</th>
                
                <td>
                        <img src="{{ asset('storage/images/'.$photo->image) }}" width="100" height="100">
                    </td>
        
            </tr>
    

            <tr>
                    <th>Description</th>
                    
                    <td>
                        {{ $photo->description }}
                    </td>
            
                </tr>


                <tr>
            
                <th>Actions</th>

        <td class="d-flex justify-content-center">

        <form action="{{ route('photo.destroy',$photo) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Del">
        </form>
            <a href="{{ route('photo.edit',$photo) }}" class="btn btn-success ml-3">Edit</a>

        </td>


                    </tr>
                        
    </table>

</div>
@endsection
