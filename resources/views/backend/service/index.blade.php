@extends('backend.layouts.app')

@section('content')

@breadcrumb()
    <li class="breadcrumb-item active">Services</li>
@endbreadcrumb

<div class="bg-white p-3">
<h3>All Services</h3>

{{ photon_notification($errors) }}

    @if (count($ourservices) > 0 )
    <table class="table table-bordered text-center">
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Title</th>
            <th>details</th>
        </tr>

            @foreach ($ourservices as $service)
            <tr>
                    <td>
                    {{ $service->id }}
                </td>
                <td>
                        <img src="{{ photon_thumbnail($service->thumbnail) }}" width="50" height="50">
                        </td>
         
                <td>
                    {{ $service->title }}
                </td>

                    <td>
                    <a href="{{ route('service.show',$service->slug) }}" class="btn btn-success">Details</a>
                    </td>
                </tr>
                        
            @endforeach
    </table>
    @else
    
    <p class="bg-info">No photo found yet</p>

    @endif

</div>
@endsection
