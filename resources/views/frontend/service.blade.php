@extends('frontend.layouts.app')
@section('content')


<div class="site-section"  data-aos="fade">
        <div class="container-fluid">
          
          <div class="row justify-content-center">
            <div class="col-md-7">
              <div class="row mb-5">
                <div class="col-12 ">
                  <h2 class="site-section-heading text-center">Our Services</h2>
                </div>
              </div>
              <div class="row">
                
                @if (count($ourservices) > 0)
                    @foreach ($ourservices as $ourservice)
                    <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5 mb-lg-5">
                      <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                        <span class="display-3 text-primary mb-4 d-block">
                            <img src="{{ photon_thumbnail($ourservice->thumbnail) }}" class="img-fluid">
                        </span>
                      <h3 class="text-black h4">{{$ourservice->title  }}</h3>
                      <p>{{
                        $ourservice->description
                        }}</p>
                        <p><strong class="font-weight-bold text-primary">
                          {{ $ourservice->price()}}</strong></p>
                      </div>
                    </div>
                            
                    @endforeach
                @endif
                
    
    
              </div>
            </div>
          </div>
        </div>
      </div>
        
    
@endsection