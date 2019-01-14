@extends('backend.layouts.app')

@section('content')


@breadcrumb()
    <li class="breadcrumb-item active">Contact infos</li>
@endbreadcrumb

<div class="bg-white p-3">
        <h3>All infos</h3>
        {{ photon_notification($errors)}}

    @if (count($infos) > 0 )
    <table class="table table-bordered text-center">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>details</th>
        </tr>

            @foreach ($infos as $info)
            <tr>
                    <td>
                    {{ $info->id }}
                </td>
        
                <td>
                    {{ $info->title }}
                </td>

                <td>
                        {{ $info->description }}
                    </td>

                    <td>
                    <a href="{{ route('contactinfo.show',$info->slug) }}" class="btn btn-success">Details</a>
                    </td>
                </tr>
                        
            @endforeach
    </table>
    @else
    
    <p class="bg-info">No album found yet</p>

    @endif

</div>
@endsection
