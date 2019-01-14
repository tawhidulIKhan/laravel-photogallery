@extends('frontend.layouts.app')
@section('content')


    <div class="container-fluid" data-aos="fade" data-aos-delay="500">
    <div class="swiper-container images-carousel">
        <div class="swiper-wrapper">
            
          @if(count($albums) > 0)
          @foreach($albums as $album)
          <div class="swiper-slide">
              <div class="image-wrap">
                <div class="image-info">
                <h2 class="mb-3">{{ $album->name }}</h2>
                <a href="{{ route('gallery',$album->slug) }}" class="btn btn-outline-white py-2 px-4">More Photos</a>
                </div>
              <img src="{{ photon_thumbnail($album->banner) }}" alt="{{ $album->name }}">
              </div>
            </div>
            @endforeach
            @endif


        
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-scrollbar"></div>
    </div>
  </div>
@endsection