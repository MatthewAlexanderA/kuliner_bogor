@extends ('layout.user')
@section ('content')
<!-- hero-section -->
<section class="hero-section about gap" style="background-image: url(assets/img/background.png);">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
						<div class="about-text">
							<ul class="crumbs d-flex">
								<li><a href="/">Home</a></li>
								<li class="two"><a href="blog"><i class="fa-solid fa-right-long"></i>Blog Page</a></li>
							</ul>
							<h2>{!! $pagetitle->judul_blog !!}</h2>
							<p>{!! $pagetitle->deskripsi_blog !!}</p>
						</div>
					</div>
					<div class="col-lg-6" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400">
						<div class="restaurants-girl-img blog food-photo-section">
							<img alt="{!! $pagetitle->judul_blog !!}" src="{{ asset('storage/'. $pagetitle->gambar_blog) }}" title="{!! $pagetitle->judul_blog !!}">
                            {{-- width: 546px; height: 516px; --}}
							<a href="#" class="one"><i class="fa-brands fa-facebook-f"></i></a>
							<a href="#" class="two"><i class="fa-brands fa-instagram"></i></a>
							<a href="#" class="three"><i class="fa-brands fa-twitter"></i></a>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- posts-section-blog -->
	<section class="posts-section-blog gap">
		<div class="container">
			<div class="row">
				{{-- <div class="col-lg-12" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="news-posts-one full">
						<div class="blog-post-data-img">
							<img alt="man" src="https://via.placeholder.com/680x450">
							<div class="quickeat">
								<a href="#">news</a>
								<a href="#">quickeat</a>
							</div>
						</div>
					<div class="blog-post-data-img">
						<h3>We Have Received An Award For The Quality Of Our Work</h3>
							<p>Scelerisque purus semper eget duis at. Tincidunt ornare massa eget egestas purus viverra. Morbi enim nunc faucibus a pellentesque. Lobortis elementum nibh tellus molestie nunc non...</p>
							<a href="showblog">Read More<i class="fa-solid fa-arrow-right"></i></a>
							<ul class="data">
								<li><h6><i class="fa-solid fa-user"></i>by Quickeat</h6></li>
								<li><h6><i class="fa-regular fa-calendar-days"></i>01.Jan. 2022</h6></li>
								<li><h6><i class="fa-solid fa-eye"></i>132</h6></li>
							</ul>
					</div>
					</div>
				</div> --}}
                @foreach ($blogs as $blog)
                    
				<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="news-posts-one blog">
						<img alt="{!! $blog->title !!}" src="{{ asset('storage/'. $blog->image) }}" title="{!! $blog->title !!}">
                        {{-- width: 443px; height: 295px --}}
						<h3>{!! $blog->title !!}</h3>
							<p>{!! substr($blog->desc, 0, 120) !!}...</p>
							<a href="{{ route('blogs.show', $blog->slug) }}">Read More<i class="fa-solid fa-arrow-right"></i></a>
							<ul class="data">
								<li><h6><i class="fa-solid fa-user"></i>by {!! $blog->auth !!}</h6></li>
								<li><h6><i class="fa-regular fa-calendar-days"></i>{!! $blog->date !!}</h6></li>
								<li><h6><i class="fa-solid fa-eye"></i>{!! $blog->view !!}</h6></li>
							</ul>

					</div>
				</div>
                @endforeach

				<div class="button-gap" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
				<a href="#" class="button button-2 non">See All<i class="fa-solid fa-arrow-right"></i></a>
			</div>
			</div>
		</div>
	</section>
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
                <form action="{{ route('emails.store') }}" method="POST">
					@csrf
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