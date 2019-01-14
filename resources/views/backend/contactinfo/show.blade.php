@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item">
        <a href="{{ route('contactinfo.index') }}">Contact Info</a>
    </li>
    <li class="breadcrumb-item active">Show</li>
@endbreadcrumb


<div class="bg-white p-3">
<h3>Details Contact Info</h3>

{{ photon_notification($errors) }}

<table class="table table-bordered text-center">
        <tr>
            <th>Id</th>
            
            <td>
                    {{ $contactInfo->id }}
                </td>
    
        </tr>

    <tr>
            <th>Title</th>
            
            <td>
                    {{ $contactInfo->title }}
                </td>
    
        </tr>


            
            <tr>
                    <th>Description</th>
                    
                    <td>
                    <p>{{ $contactInfo->description }}</p>     
                    </td>
            
                </tr>
    
        <tr>
            
                <th>Actions</th>

        <td class="d-flex justify-content-center">

        <form action="{{ route('contactinfo.destroy',$contactInfo->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Del">
        </form>
            <a href="{{ route('contactinfo.edit',$contactInfo->slug) }}" class="btn btn-success ml-3">Edit</a>

        </td>


                    </tr>
                        
    </table>

</div>
@endsection
