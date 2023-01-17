@extends ('layout.user')
@php
	use App\Models\Rating;
	use App\Models\User;
@endphp
@section ('content')

	<!-- hero-section -->
	<section class="hero-section about gap" style="background-image: url({{ asset('') }}assets/user/img/background.png);">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-12 col-sm-12" data-aos="fade-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="about-text">
						<ul class="crumbs d-flex">
							<li><a href="/">Home</a></li>
							<li><a href="{{ route('restoran.index') }}"><i class="fa-solid fa-right-long"></i> {!! $pagetitle->page_resto !!}</a></li>
							<li class="two"><a href=""><i class="fa-solid fa-right-long"></i> {!! $product->title !!}</a></li>
						</ul>
						<h2>{!! $product->title !!}</h2>
						<p>{!! $product->quotes !!}</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12" data-aos="fade-up"  data-aos-delay="400" data-aos-duration="500">
					<div class="about-img">
						<img alt="{!! $product->title !!}" src="{{ asset('storage/'. $product->image) }}" style="object-fit: contain;" title="{!! $product->title !!}">
						{{-- wdith: 499px; height: 500px; --}}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- our-mission-section -->
	<section class="our-mission-section gap">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12 col-md-12 col-sm-12" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="our-mission-img">
						<img alt="{!! $product->title !!}}" src="{{ asset('storage/'. $product->image) }}" style="width: 100%; height: 430px;object-fit: contain;" title="{!! $product->title !!}">
                        {{-- width: 680px height: 430px; --}}
					</div>
					<br>
                    <div class="our-mission-text">
						<h2 style="text-align: center;">{!! $product->title !!}</h2>
							<p>{!! $product->desc !!}</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- cards-section -->
	{{-- <section class="cards-section gap no-top">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="card-text-data">
						<img class="on" alt="icon" src="asset/template/assets/img/service-icon-2.svg">
						<img class="off" alt="icon" src="asset/template/assets/img/service-icon-1.svg">

						<h3>Free
								Delivery</h3>
								<p>Cras fermentum odio eu feugiat pretium nibh ipsum. Ut faucibus pulvinar elementum integer enim neque volutpat.</p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="card-text-data two">
						<img class="on" alt="icon" src="asset/template/assets/img/service-icon-3.svg">
						<img class="off" alt="icon" src="asset/template/assets/img/service-icon-4.svg">

						<h3>Save
								Your Time</h3>
								<p>Vulputate dignissim suspendisse in est ante in nibh mauris. Pretium nibh ipsum consequat nisl vel pretium lectus quam id.</p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="400" data-aos-duration="500">
					<div class="card-text-data">
						<img class="on" alt="icon" src="asset/template/assets/img/service-icon-5.svg">
						<img class="off" alt="icon" src="asset/template/assets/img/service-icon-6.svg">

						<h3>Regular Discounts</h3>
								<p>Nec tincidunt praesent semper feugiat nibh. Feugiat in ante metus dictum. Sapien nec sagittis aliquam malesuada bibendum arcu.</p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12" data-aos="flip-up"  data-aos-delay="500" data-aos-duration="600">
					<div class="card-text-data two">
						<img class="on" alt="icon" src="asset/template/assets/img/service-icon-7.svg">
						<img class="off" alt="icon" src="asset/template/assets/img/service-icon-8.svg">
						<h3>Variety
								Food</h3>
						<p>Molestie a iaculis at erat pellentesque. Pulvinar neque laoreet suspendisse interdum consectetur libero id faucibus nisl.</p>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- video-section -->
	<section class="video-section gap">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
					<div class="wait-a-minute">
						<h2>{!! $product->name !!}</h2>
						<p>{!! $product->short_desc !!}</p>
						<h6>Keunggulan dari Restoran Ini:.</h6>
						<ul class="paragraph">
							@foreach (explode(',', $product->benefit) as $benefit)
							<li><i class="fa-solid fa-circle-check"></i><h5>{!! $benefit !!}</h5></li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up"  data-aos-delay="300" data-aos-duration="400">
					<div class="video-section-img">
						<img alt="elements" src="{{ asset('storage/'. $product->image) }}" style="width: 100%; height: 500px; border-radius: 70px; object-fit: cover;">
						{{-- width: 560px; height: 560px; --}}
						{{-- <a data-fancybox="" href="https://www.youtube.com/watch?v=CKnGXZxK7zs"><i class="fa-solid fa-play"></i></a> --}}
					</div>
				</div>
			</div>
		</div>
	</section>
	

	<!-- Our Team Section -->
	<section class="our-team-section gap">
		<div class="container">
			<div class="hading" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
				<h2>{!! $pagetitle->judul_menu !!}</h2>
				<p>{!! $pagetitle->deskripsi_menu !!}</p>
			</div>
			<div class="row">
				@foreach ($menu as $menu)
					
   	 		<div class="col-xl-4 col-lg-6" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
				<div class="dish">
					<img alt="food-dish" src="{{ asset('storage/'. $menu->image) }}" style="width: 100%; height: 236px;">
					{{-- width: 369px; height: 236px; --}}
					<div class="dish-foods">
						<h3>{!! $menu->title !!}</h3>
								<div class="dish-icon">

									<div class="dish-icon end">
										<p>{!! substr($menu->desc, 0, 50) !!}...</p>
										{{-- <i class="info fa-solid fa-circle-info"></i> --}}
									</div>
							 </div>
							 <div class="price">
								 <h2>Rp.{!! $menu->harga !!}</h2>
							   </div>
							   <button class="button-price info">Learn More<i class="fa-solid fa-circle-info"></i></button>
						</div>
						<div class="dish-info" style="display: none;">
							<i class="info2 fa-solid fa-xmark"></i>
							<h5>
								{!! $menu->title !!}
							</h5>
							{!! $menu->desc !!}
						</div>
				</div>
		   </div>
				@endforeach

			</div>
		</div>
	</section>
	
	<!-- Our partners Section -->
	<section class="service-shows gap" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-4 col-lg-12">
					<div class="good-taste">
						<h2>{!! $pagetitle->judul_testimonial !!}</h2>
						<p>{!! $pagetitle->deskripsi_testimonial !!}</p>
					</div>
				</div>
				<div class="col-xl-8 col-lg-12">
					<div class="comment-data comment-slide owl-carousel owl-theme">
						@foreach ($rating as $testimonial)
							
						<div class="author-text item">
							
							<p>{!! $testimonial->desc !!}</p>
							<div class="thomas">
								<img alt="girl" src="{{ asset('assets/images/icon.png') }}" style="width: 70px; height: 70px;">
								{{-- width: 70px; height: 70px; --}}

								<div>
									@php
										$user = User::where('id', $testimonial->user_id)->first();
									@endphp
									<h6>{!! $user->username !!}</h6>
									<i class="fa-solid fa-star"></i>
									@if ($testimonial->rating > 1)
									<i class="fa-solid fa-star"></i>
										
									@endif
									@if ($testimonial->rating > 2)
									<i class="fa-solid fa-star"></i>
										
									@endif
									@if ($testimonial->rating > 3)
									<i class="fa-solid fa-star"></i>
										
									@endif
									@if ($testimonial->rating > 4)
									<i class="fa-solid fa-star"></i>
										
									@endif
								</div>
							</div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
			<div class="row justify-content-center mt-5 pt-5">
				<div class="col-8">
					<div class="comment">
						<h2>Leave your comment</h2>
						@if (Auth::user())
							@php
								$rating = Rating::where('resto_id', $product->id)->where('user_id', Auth::user()->id)->first();
							@endphp
						@endif
						@if (!$rating)
							<form class="comment-blog" action="{{ route('rating.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="resto_id" value="{{ $product->id }}">
								@if (Auth::user())
									<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
								@endif
								<textarea placeholder="Enter you comment" name="desc"></textarea>
								<div class="row">
									<div class="col-lg-12">
										<label for="rating">Rating /5</label>
										<input type="range" style="width: 100%;" step="1" min="1" max="5" name="rating" id="rating" value="1">
									</div>
								</div>
								<button class="button-price" type="submit">Publish a comment</button>
							</form>

						@elseif ($rating && Auth::user())
							<form class="comment-blog" action="{{ route('rating.update', $rating->id) }}" method="POST" enctype="multipart/form-data">
								@csrf
								@method('PUT')

								<input type="hidden" name="resto_id" value="{{ $product->id }}">
								@if (Auth::user())
									<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
								@endif
								<textarea placeholder="Enter you comment" name="desc">{{ $rating->desc }}</textarea>
								<div class="row">
									<div class="col-lg-12">
										<label for="rating">Rating /5</label>
										<input type="range" style="width: 100%;" step="1" min="1" max="5" name="rating" id="rating" value="{{ $rating->rating }}">
									</div>
								</div>
								<button class="button-price" type="submit">Update a comment</button>
							</form>

						@else

						<form class="comment-blog" action="{{ route('rating.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="resto_id" value="{{ $product->id }}">
							@if (Auth::user())
								<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
							@endif
							<textarea placeholder="Enter you comment" name="desc"></textarea>
							<div class="row">
								<div class="col-lg-12">
									<label for="rating">Rating /5</label>
									<input type="range" style="width: 100%;" step="1" min="1" max="5" name="rating" id="rating" value="1">
								</div>
							</div>
							<button class="button-price" type="submit">Publish a comment</button>
						</form>
						
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- subscribe-section -->
	<section class="subscribe-section about gap" >
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="get-the-menu">
						<h2 data-aos="fade-up"  data-aos-delay="200" data-aos-duration="300">Get the menu of your favorite restaurants every day</h2>
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