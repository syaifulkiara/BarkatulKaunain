@extends('layouts.backend')

@section('content')
<div class="row text-center">
    <div class="col-xl-2 mb-4">
        <div class="card-body">
            <a href="{{route('tawasul.index')}}" class="btn btn-light">
                <img src="{{ asset('back/img/open-book.png')}}" alt="" width="120px" height="120px">
                <h6 class="mt-2" style="font-weight: bold;color:navy">({{ $tawasul->count() }}) TAWASUL</h6>
            </a>
        </div>
    </div>
    <div class="col-xl-2 mb-4">
        <div class="card-body">
            <a href="{{route('silsilah.index')}}" class="btn btn-light">
            <img src="{{ asset('back/img/management.png')}}" alt="" width="120px" height="120px">
               <h6 class="mt-2" style="font-weight: bold;color:navy">({{ $silsilah->count() }}) SILSILAH</h6>
           </a>
       </div>
    </div>
    <div class="col-xl-2 mb-4">
        <div class="card-body">
            <a href="{{route('users.index')}}" class="btn btn-light">
            <img src="{{ asset('back/img/my-profile.png')}}" alt="" width="120px" height="120px">
              <h6 class="mt-2" style="font-weight: bold;color:navy">({{ $users->count() }}) USERS</h6>
          </a>
      </div>
    </div>
    <div class="col-xl-2 mb-4">
        <div class="card-body">
            <a href="{{route('artikel.index')}}" class="btn btn-light">
            <img src="{{ asset('back/img/22.png')}}" alt="" width="120px" height="120px">
              <h6 class="mt-2" style="font-weight: bold;color:navy">({{ $artikels->count() }}) BERITA</h6>
          </a>
      </div>
    </div>
    <div class="col-xl-2 mb-4">
        <div class="card-body">
            <a href="{{route('pages.index')}}" class="btn btn-light">
            <img src="{{ asset('back/img/landing-page.png')}}" alt="" width="120px" height="120px">
              <h6 class="mt-2" style="font-weight: bold;color:navy">({{ $pages->count() }}) HALAMAN</h6>
          </a>
      </div>
    </div>
    <div class="col-xl-2 mb-4">
        <div class="card-body">
            <a href="{{route('settings.index')}}" class="btn btn-light">
            <img src="{{ asset('back/img/setting.png')}}" alt="" width="120px" height="120px">
              <h6 class="mt-2" style="font-weight: bold;color:navy"> SETTING</h6>
          </a>
      </div>
    </div>
</div>
<div class="row text-center">
    <div class="col-xl-2 mb-4">
        <div class="card-body">
            <a href="{{route('tawasul.index')}}" class="btn btn-light">
                <img src="{{ asset('back/img/gallery.png')}}" alt="" width="120px" height="120px">
                <h6 class="mt-2" style="font-weight: bold;color:navy">({{ $tawasul->count() }}) GALLERY</h6>
            </a>
        </div>
    </div>
    
    
</div>
@endsection