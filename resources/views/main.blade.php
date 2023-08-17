@extends('layouts.master')

@section('content')
<section class="">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-12 p-0">
				<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              @foreach($sliders as $slid)  
              <div class="carousel-item active">
				      <img src="{{ asset($slid->images)}}" height="500px" class="d-block w-100" alt="...">
				      </div>
				      @endforeach
				   </div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-padding">
	<div class="container">
		<div class="row">

			<div class="col-lg-10 col-12 text-center mx-auto">
				<h2 class="mb-5">Selamat Datang di BarkatulKaunain.my.id</h2>
			</div>

			<div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
				<div class="featured-block d-flex justify-content-center align-items-center">
					<a href="" class="d-block">
						<img src="{{ asset('front/images/icons/hands.png')}}" class="featured-block-image img-fluid" alt="">

						<p class="featured-block-text">Mari <strong>Berdonasi</strong></p>
					</a>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
				<div class="featured-block d-flex justify-content-center align-items-center">
					<a href="" class="d-block">
						<img src="{{ asset('front/images/icons/heart.png')}}" class="featured-block-image img-fluid" alt="">

						<p class="featured-block-text"><strong>Peduli</strong> Sesama</p>
					</a>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
				<div class="featured-block d-flex justify-content-center align-items-center">
					<a href="donate.html" class="d-block">
						<img src="{{ asset('front/images/icons/receive.png')}}" class="featured-block-image img-fluid" alt="">

						<p class="featured-block-text">Silahtu <strong>Rahmi</strong></p>
					</a>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
				<div class="featured-block d-flex justify-content-center align-items-center">
					<a href="" class="d-block">
						<img src="{{ asset('front/images/icons/scholarship.png')}}" class="featured-block-image img-fluid" alt="">

						<p class="featured-block-text"><strong>Syiar</strong> Islam</p>
					</a>
				</div>
			</div>

		</div>
	</div>
</section>

<section class="section-padding" id="section_3">
	<div class="container">
		<div class="row">

			<div class="col-lg-12 col-12 text-center mb-4">
				<h2>Features</h2>
			</div>
			@foreach($features->take(3) as $item)
			<div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
				<div class="custom-block-wrap">
					<img src="{{asset($item->gambar)}}" class="custom-block-image img-fluid" height="250px" alt="">
					<div class="custom-block">
						<div class="custom-block-body">
							<a href="{{route('main.detail', $item->slug)}}"><h5 class="mb-3">{{$item->judul}}</h5></a>
							<p>{!! Str::limit($item->konten,100) !!}</p>	
						</div>
					</div>
				</div>
			</div>
			@endforeach
			

		</div>
	</div>
</section>

<section class="news-section section-padding" id="section_5">
	<div class="container">
		<div class="row">

			<div class="col-lg-12 col-12 mb-5">
				<h2>Berita</h2>
			</div>

			<div class="col-lg-7 col-12">
				@foreach($artikels->take(10) as $item)
				<div class="news-block">
					<div class="news-block-top">
						<a href="{{route('main.detail', $item->slug)}}">
							<img src="{{ asset($item->gambar)}}" class="news-image img-fluid" alt="">
						</a>

						<div class="news-category-block">
							<a href="#" class="category-block-link">
								{{$item->category->nama}}
							</a>
						</div>
					</div>

					<div class="news-block-info">
						<div class="d-flex mt-2">
							<div class="news-block-date">
								<p>
									<i class="bi-calendar4 custom-icon me-1"></i>
									{{date('d-m-Y', strtotime($item->created_at))}}
								</p>
							</div>

							<div class="news-block-author mx-5">
								<p>
									<i class="bi-person custom-icon me-1"></i>
									By {{$item->penulis}}
								</p>
							</div>

							<div class="news-block-comment">
								<p>
									<i class="bi-chat-left custom-icon me-1"></i>
									32 Comments
								</p>
							</div>
						</div>

						<div class="news-block-title mb-2">
							<h4><a href="{{route('main.detail', $item->slug)}}" class="news-block-title-link">{{$item->judul}}</a></h4>
						</div>

						<div class="news-block-body">
							<p>{!! Str::limit($item->konten,100) !!}</p>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>

			<div class="col-lg-4 col-12 mx-auto">
				<form class="custom-form search-form" action="#" method="get" role="form">
					<input name="search" type="search" class="form-control" id="search" placeholder="Cari..." aria-label="Search">

					<button type="submit" class="form-control">
						<i class="bi-search"></i>
					</button>
				</form>

				<h5 class="mt-5 mb-3">Berita Terbaru</h5>
				@foreach($artikels->take(2) as $item)
				<div class="news-block news-block-two-col d-flex mt-4">
					<div class="news-block-two-col-image-wrap">
						<a href="{{route('main.detail', $item->slug)}}">
							<img src="{{ asset($item->gambar)}}" class="news-image img-fluid" alt="">
						</a>
					</div>

					<div class="news-block-two-col-info">
						<div class="news-block-title mb-2">
							<h6><a href="{{route('main.detail', $item->slug)}}" class="news-block-title-link">{!! Str::limit($item->judul,30) !!}</a></h6>
						</div>

						<div class="news-block-date">
							<p>
								<i class="bi-calendar4 custom-icon me-1"></i>
								{{date('d-m-Y', strtotime($item->created_at))}}
							</p>
						</div>
					</div>
				</div>
				@endforeach
				<div class="category-block d-flex flex-column">
					<h5 class="mb-3">Categories</h5>
					@foreach($categories as $item)
					<a href="#" class="category-block-link">
						{{$item->nama}}
						<span class="badge">20</span>
					</a>
					@endforeach
				</div>

				<div class="tags-block">
					<h5 class="mb-3">Tags</h5>

					<a href="#" class="tags-block-link">
						Donation
					</a>

					<a href="#" class="tags-block-link">
						Clothing
					</a>
				</div>

				<form class="custom-form subscribe-form" action="#" method="get" role="form">
					<h5 class="mb-4">Formulir Berlangganan</h5>

					<input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address" required>

					<div class="col-lg-12 col-12">
						<button type="submit" class="form-control">Subscribe</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</section>
@endsection