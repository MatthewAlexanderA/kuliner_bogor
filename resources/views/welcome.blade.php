@extends ('layout.user')
@section ('content')
<?php
use App\Models\Category;
use App\Models\Rating;
?>
<!-- hero-section -->
<section class="hero-section gap" style="background-image: url(assets/img/background-1.png);">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
          <div class="restaurant">
            <h1>{!! $banner->judul !!}</h1>
            <p>{!! $banner->deskripsi !!}</p>
            <div class="nice-select-one">
              {{-- <select class="nice-select Advice">
                <option>Choose a Restaurant</option>
                <option>Choose a Restaurant 1</option>
                <option>Choose a Restaurant 2</option>
                <option>Choose a Restaurant 3</option>
                <option>Choose a Restaurant 4</option>
            </select> --}}
            <form action="{{ url('restoran') }}" autocomplete="off" method="get">
              <input type="text" placeholder="Search your keyword..." name="search" style="color: #CFCFCF;
              border: none;
              box-shadow: -1px 15px 26px -4px rgba(161,151,151,0.15);
              -webkit-box-shadow: -1px 15px 26px -4px rgba(161,151,151,0.15);
              -moz-box-shadow: -1px 15px 26px -4px rgba(161,151,151,0.15);
              padding: 20px;
              height: 55px;
              width: 90%;
              font-size: 18px;">
              <i class="fa-solid fa-magnifying-glass"></i>          
            </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up"  data-aos-delay="300" data-aos-duration="400">
          <div class="img-restaurant">
            <img alt="{!! $banner->judul !!}" src="{{ asset('storage/'. $banner->gambar) }}" title="{!! $banner->judul !!}">
            {{-- width: 680px; height: 720px: --}}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- works-section -->
  <section class="works-section gap no-top">
    <div class="container">
      <div class="hading" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
        <h2>{!! $pagetitle->judul_alur !!}</h2>
        <p>{!! $pagetitle->deskripsi_alur !!}</p>
      </div>
      <div class="row ">
        @php
            $i = 1;
        @endphp
        @foreach ($alur as $alur)
            
        <div class="col-lg-4 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
          <div class="work-card">
            <img alt="{!! $alur->judul !!}" src="{{ asset('storage/'. $alur->gambar) }}" title="{!! $alur->judul !!}" style="width: 300px; height: 154px;">
            {{-- width: 300px; height: 154px; --}}
            <h4><span>0{!! $i++ !!}</span>  {!! $alur->judul !!}</h4>
            <p>{!! $alur->deskripsi !!}</p>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- best-restaurants -->
  <section class="best-restaurants gap" style="background:#fcfcfc">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
            <div class="city-restaurants">
              <h2>{!! $pagetitle->judul_resto !!}</h2>
              <p>{!! $pagetitle->deskripsi_resto !!}</p>
            </div>
        </div>
        @foreach ($product as $product)
            
        <div class="col-lg-6" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400">
          <div class="logos-card">
            <img alt="{!! $product->title !!}" src="{{ asset('storage/'. $product->image) }}" style="width: 100px; height: 100px; object-fit: cover;" title="{!! $product->title !!}" >
            {{-- width: 100px; height: 100px; --}}
			<div class="cafa">
                <h4><a href="{{ route('restoran.show', $product->slug) }}">{!! $product->title !!}</a></h4>
                <div>
                  @php
                      $rating = Rating::where('resto_id', $product->id)->sum('rating');
                      $count = Rating::where('resto_id', $product->id)->count();
                  @endphp
                  @if ($count == 0)
                      0
                  @else
                  {{ $rating/$count }}
                  @endif
                  <i class="fa-solid fa-star"></i>
                </div>
                <div class="cafa-button">
                    @php
                        $kategoriproduct = Category::where('id', $product->category)->first();
                    @endphp
                    <a href="{{ route('categoryrestoran.show', $kategoriproduct->slug) }}">{!! $kategoriproduct->category !!}</a>
                </div>
                <p>{!! substr($product->desc, 0, 100) !!}...</p>
              </div>
          </div>
        </div>
        @endforeach

      </div>
      <div class="button-gap">
        <a href="{{ route('restoran.index') }}" class="button button-2 non">See All<i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </section> 
  <!-- counters-section -->
  <section class="counters-section">
    <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-3 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
            <div>
              <h2>{!! $pagetitle->judul_counter !!}</h2>
            </div>
          </div>
          @php
              $q = 300;
              $w = 400;
          @endphp
          @foreach ($counter as $counter)
              
          <div class="col-lg-3 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="{!! $q++ !!}" data-aos-duration="{!! $w++ !!}">
            <div class="count-time">
                <h2 class="timer count-title count-number" data-to="{!! $counter->number !!}" data-speed="2000">{!! $counter->number !!}</h2>
                  <p>{!! $counter->title !!}<br></p>
            </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
 <!-- reviews-sections -->
 <section class="reviews-sections gap">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-6 col-lg-12" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
          <div class="reviews-content">
            <h2>{!! $pagetitle->judul_testimonial !!}</h2>
            <div class="custome owl-carousel owl-theme">
                @foreach ($testimonial as $testimonial)
                    
              <div class="item">
                <h4>{!! $testimonial->deskripsi !!}</h4>
                <div class="thomas">
                  <img alt="{!! $testimonial->nama !!}" src="{{ asset('storage/'. $testimonial->gambar) }}" title="{!! $testimonial->nama !!}">
                  {{-- width: 70px; height: 70px; --}}
                  <div>
                    <h6>{!! $testimonial->nama !!}</h6>
                  </div>
                </div>
            </div>
            @endforeach

          </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12" data-aos="fade-up"  data-aos-delay="300" data-aos-duration="400">
          <div class="reviews-img">
            <img alt="{!! $pagetitle->judul_testimonial !!}" src="{{ asset('storage/'. $pagetitle->gambar_testimonial) }}" title="{!! $pagetitle->judul_testimonial !!}" style="width: 100%; heigth: 585px;">
            {{-- width: 670px; height: 585px; --}}
            <i class="fa-regular fa-thumbs-up"></i>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Our partners Section -->
  <section class="our-partners-section gap" style="background:#fcfcfc" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
    <div class="container">
      <div class="hading">
        <h2>Our trusted partners</h2>
      </div>
      <div class="row align-items-center logodata owl-carousel owl-theme">
        @foreach ($partner as $partner)
            
        <div class="col-xl-12 item">
          <div class="logo-img">
            <img alt="{!! $partner->judul !!}" src="{{ asset('storage/'. $partner->gambar) }}" title="{!! $partner->judul !!}">
            {{-- width: 140px; height: 124px; --}}
            <h5>{!! $partner->nama !!}</h5>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- Our partners Section -->
  <!-- subscribe-section -->
  <section class="subscribe-section gap" style="background:#fcfcfc">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
          <div class="img-subscribe">
            <img alt="{!! $pagetitle->judul_subscribe !!}" src="{{ asset('storage/'. $pagetitle->gambar_subscribe) }}" title="{!! $pagetitle->judul_subscribe !!}" style="width: 100%; height: 403px;">
            {{-- width: 676px; height: 403px; --}}
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400">
          <div class="get-the-menu">
            <h2>{!! $pagetitle->judul_subscribe !!}</h2>
            <form>
              <i class="fa-regular fa-bell"></i>
              <input type="text" name="email" placeholder="Enter email address">
              <button class="button button-2">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

