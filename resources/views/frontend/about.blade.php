@extends('frontend.layouts.app')
@section('content')

<div class=""  data-aos="fade">
        <div class="container-fluid">
          
          <div class="row justify-content-center">
            <div class="col-md-7">
              <div class="row mb-5 site-section">
                <div class="col-12 ">
                  <h2 class="site-section-heading text-center">About Us</h2>
                </div>
              </div>
    
              {{-- <div class="row mb-5">
                <div class="col-md-7">
                  <img src="images/img_2.jpg" alt="Images" class="img-fluid">
                </div>
                <div class="col-md-4 ml-auto">
                  <h3>Our Mission</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus vel tenetur explicabo necessitatibus, ad soluta consectetur illo qui voluptatem. Quis soluta maiores eum. Iste modi voluptatum in repudiandae fugiat suscipit dolorum harum, porro voluptate quis? Alias repudiandae dicta doloremque voluptates soluta repellendus, unde laborum quo nam, ullam facere voluptatem similique.</p>
                </div>
              </div> --}}
    
             
              <div class="row site-section">
                @if (count($teams) > 0)
                    @foreach ($teams as $team)
                    <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5">
                    <img src="{{ photon_thumbnail($team->thumbnail) }}" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                    <h2 class="text-black font-weight-light mb-4">{{ $team->name }}</h2>
                        <p class="mb-4">
                          {{ $team->description }}
                        </p>
                        <p>
                          <a href="#" class="pl-0 pr-3"><span class="icon-twitter"></span></a>
                          <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                          <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
                        </p>
                      </div>
                              
                    @endforeach
                @endif
              </div>
            </div>
        
          </div>
        </div>
      </div>
@endsection