@extends('layouts.app')

@section('content')


<div class="container">
<h2>Create album</h2>

@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
    
@endif

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
    
@endif
    <table class="table table-bordered text-center">
        <tr>
            <th>Id</th>
            
            <td>
                    {{ $album->id }}
                </td>
    
        </tr>

    <tr>
            <th>Name</th>
            
            <td>
                    {{ $album->name }}
                </td>
    
        </tr>

        <tr>
                <th>Banner</th>
                
                <td>
                        <img src="{{ asset('storage/images/'.$album->banner) }}" width="100" height="100">
                    </td>
        
            </tr>
    
        <tr>
            
                <th>Actions</th>

        <td class="d-flex justify-content-center">

        <form action="{{ route('album.destroy',$album) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Del">
        </form>
            <a href="{{ route('album.edit',$album) }}" class="btn btn-success ml-3">Edit</a>

        </td>


                    </tr>
                        
    </table>

</div>
@endsection
