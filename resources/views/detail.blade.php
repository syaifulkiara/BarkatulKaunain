@extends('layouts.master')

@section('content')
<section class="news-section section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-12">
				<div class="news-block">
					<div class="news-block-title">
						<h4>{{$posts->judul}}</h4>
					</div>
					<div class="news-block-info">
						<div class="d-flex">
							<div class="news-block-date">
								<p>
									<i class="bi-calendar4 custom-icon me-1"></i>
									{{strftime("%A, %d %B %Y",strtotime($posts->created_at))}} 
								</p>
							</div>
							<div class="news-block-author mx-5">
								<p>
									<i class="bi-person custom-icon me-1"></i>
									By {{$posts->penulis}}
								</p>
							</div>
							<div class="news-block-comment">
								<p>
									@if (!empty($posts->category->nama))
									<i class="bi-chat-left custom-icon me-1"></i>
									{{$posts->category->nama}}
									@else			                          
									<i class="bi-chat-left custom-icon me-1"></i>
									no category
									@endif  
								</p>
							</div>
						</div>
						<div class="news-block-top">
							<img src="{{asset($posts->gambar)}}" class="news-image img-fluid" alt="">
							<div class="news-category-block">
								<a href="#" class="category-block-link">
									{{$posts->judul}}
								</a>
							</div>
						</div>
						<div class="news-block-body">
							<p>{!! $posts->konten !!}</p>
						</div>
						<!--<div class="row mt-5 mb-4">-->
						<!--	<div class="col-lg-6 col-12 mb-4 mb-lg-0">-->
						<!--		<img src="{{asset($posts->gambar)}}" class="news-detail-image img-fluid" alt="">-->
						<!--	</div>-->
						<!--	<div class="col-lg-6 col-12">-->
						<!--		<img src="{{asset($posts->gambar)}}" class="news-detail-image img-fluid" alt="">-->
						<!--	</div>-->
						<!--</div>-->
						<div class="social-share border-top mt-5 py-4 d-flex flex-wrap align-items-center">
							<div class="tags-block me-auto">
								<a href="#" class="tags-block-link">
									Donation
								</a>
								<a href="#" class="tags-block-link">
									Clothing
								</a>
								<a href="#" class="tags-block-link">
									Food
								</a>
							</div>
							<div class="d-flex">
								<a href="#" class="social-icon-link bi-facebook"></a>
								<a href="#" class="social-icon-link bi-twitter"></a>
								<a href="#" class="social-icon-link bi-printer"></a>
								<a href="#" class="social-icon-link bi-envelope"></a>
							</div>
						</div>
						<div class="author-comment d-flex mt-3 mb-4">
							<img src="{{ asset('front/images/avatar/studio-portrait-emotional-happy-funny.jpg')}}" class="img-fluid avatar-image" alt="">
							<div class="author-comment-info ms-3">
								<h6 class="mb-1">Anonim</h6>
								<p class="mb-0">Thank you.</p>
								<div class="d-flex mt-2">
									<a href="#" class="author-comment-link me-3">Like</a>
									<a href="#" class="author-comment-link">Reply</a>
								</div>
							</div>
						</div>
						<div class="author-comment d-flex ms-5 ps-3">
							<img src="{{ asset('front/images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg')}}" class="img-fluid avatar-image" alt="">
							<div class="author-comment-info ms-3">
								<h6 class="mb-1">Desy</h6>
								<p class="mb-0">Yes</p>
								<div class="d-flex mt-2">
									<a href="#" class="author-comment-link me-3">Like</a>
									<a href="#" class="author-comment-link">Reply</a>
								</div>
							</div>
						</div>
						<form class="custom-form comment-form mt-4" role="form">
							<h6 class="mb-3">Berikan Komentar</h6>
							<textarea name="comment-message" rows="4" class="form-control" id="comment-message" placeholder="Tulis disini..."></textarea>
							<div class="col-lg-3 col-md-4 col-6 ms-auto">
								<button type="submit" class="form-control">Komentar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12 mx-auto mt-4 mt-lg-0">
				<form class="custom-form search-form" action="#" method="post" role="form">
					<input class="form-control" type="search" placeholder="Search" aria-label="Search">
					<button type="submit" class="form-control">
						<i class="bi-search"></i>
					</button>
				</form>
				<h5 class="mt-5 mb-3">Recent news</h5>
				@foreach($artikels->take(5) as $item)
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
						<span class="badge">{{ $item->artikel->count() }}</span>
					</a>
					@endforeach
					
				</div>
				<div class="tags-block">
					<h5 class="mb-3">Tags</h5>
					@if (!empty($posts->category->nama))
					<a href="#" class="tags-block-link">
					{{$posts->category->nama}}
					</a>
					@else
					<a href="#" class="tags-block-link">
						No Category
					</a>
				    @endif
				</div>
				<form class="custom-form subscribe-form" action="#" method="post" role="form">
					<h5 class="mb-4">Newsletter Form</h5>
					<input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address" required>
					<div class="col-lg-12 col-12">
						<button type="submit" class="form-control">Subscribe</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<section class="news-section section-padding section-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-12 mb-4">
				<h2>Berita Terkait</h2>
			</div>
			@foreach($relateds->take(2) as $item)
			<div class="col-lg-6 col-12">
				<div class="news-block">
					<div class="news-block-top">
						<a href="{{route('main.detail', $item->slug)}}">
							<img src="{{asset($item->gambar)}}" class="news-image img-fluid" alt="">
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
									24 Comments
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
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection