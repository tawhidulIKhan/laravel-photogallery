@extends('frontend.layouts.app')
@section('content')

  <div class="site-section"  data-aos="fade">
    <div class="container-fluid">
      
      <div class="row justify-content-center">
        
        <div class="col-md-7">
          <div class="row mb-5">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">{{ $title }} Gallery</h2>
            </div>
          </div>
        </div>
    
      </div>
      <div class="row" id="lightgallery">
        @if (count($photos) > 0)
            @foreach ($photos as $photo)

            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" 
            data-aos="fade" 
            data-src="{{ photon_thumbnail($photo->image) }}" 
            data-sub-html="<h4>{{ $photo->title}}</h4><p>{{ $photo->description}}</p>">
                
            <a href="#">
                    <img src="{{ photon_thumbnail($photo->image) }}" alt="IMage" class="img-fluid">
                </a>
              </div>
                      
            @endforeach
        @endif
      </div>
    </div>
  </div>
@endsection