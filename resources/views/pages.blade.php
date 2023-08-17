@extends('layouts.master')

@section('content')
<section class="section-padding section-bg" id="section_2">
    <div class="container">         
        <img src="{{ asset($page->gambar)}}" class="custom-text-box-image" height="100px" alt="">
    </div>
</section>
<section class="about-section section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-5 col-12">
				<img src="{{ asset('front/images/logo.jpg')}}" class="about-image ms-lg-auto bg-light shadow-lg img-fluid" alt="">
			</div>
			<div class="col-lg-5 col-md-7 col-12">
				<div class="custom-text-block">
					<h2 class="mb-0">Barkatul Kaunain</h2>
					<p class="text-muted mb-lg-4 mb-md-4">Keluarga Besar Kumpi Abdurrahman</p>
					<p></p>
					<p></p>
					<ul class="social-icon mt-4">
						<li class="social-icon-item">
							<a href="https://twitter.com/cucuabdurrahman" target="_blank" class="social-icon-link bi-twitter"></a>
						</li>
						<li class="social-icon-item">
							<a href="https://www.facebook.com/groups/282685402283349" target="_blank" class="social-icon-link bi-facebook"></a>
						</li>
						<li class="social-icon-item">
							<a href="https://www.instagram.com/kumpiabdurrahman" target="_blank" class="social-icon-link bi-instagram"></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection