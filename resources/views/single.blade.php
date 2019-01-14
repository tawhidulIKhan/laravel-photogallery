@extends('layouts.app')
@section('content')
    


  <div class="site-section"  data-aos="fade">
    <div class="container-fluid">
      
      <div class="row justify-content-center">
        
        <div class="col-md-7">
          <div class="row mb-5">
            <div class="col-12 ">
            <h2 class="site-section-heading text-center">{{ $album->name }}</h2>
            </div>
          </div>
        </div>
    
      </div>
      <div class="row" id="lightphoto">
         @if (count($album->photo) > 0)

            @foreach ($album->photo as $photo)

            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="{{ asset('storage/images/'.$photo->image) }}" 
                data-sub-html="<h4>{{ $photo->title }}</h4>
                <p>
                    {{ $photo->description }}
                </p>">
            <a href="#"><img src="{{ asset('storage/images/'.$photo->image) }}" alt="IMage" class="img-fluid"></a>
              </div>
                      
            @endforeach
             
         @endif 

      </div>
    </div>
  </div>

  <div class="footer py-4">
    <div class="container-fluid text-center">
      <p>
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
    </div>
  </div>

    

    
    
  </div>

  @endsection
