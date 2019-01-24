@extends('backend.layouts.app')


@section('content')

@breadcrumb()
    <li class="breadcrumb-item active">settings</li>
@endbreadcrumb


<div class="bg-white p-3">
<h3>All settings</h3>

{{ photon_notification($errors)}}

@if (count($settings) > 0 )

    <table class="table table-bordered text-center mt-4">
        <tr>
            <th>Id</th>
            <th>Key</th>
            <th>Name</th>
            <th>Value</th>
            <th>Actions</th>
        </tr>

            @foreach ($settings as $setting)
            <tr>
                    <td>
                    {{ $setting->id }}
                </td>
                <td>
                        {{ $setting->key }}
                    </td>

                    
                <td>
                    {{ $setting->display_name }}
                </td>

                <td>
                    {{ $setting->value }}
                </td>

                <td class="d-flex">
               
               
        <form action="{{ route('settings.destroy',$setting->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Del">
            </form>
            <a href="{{ route('settings.edit',$setting->slug) }}" 
                class="btn btn-success ml-3">Edit</a>

            </td>
                </tr>
                        
            @endforeach
    </table>
    @else
    
    <p class="bg-info">No setting found yet</p>

    @endif
</div>

@endsection
