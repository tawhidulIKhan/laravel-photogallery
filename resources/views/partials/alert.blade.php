@if(session()->has('message'))
 <div class="alert alert-{{session()->get('type')}}">{{session()->get('message')}}</div>
@endif;

@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif
