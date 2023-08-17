@extends('layouts.backend')

@section('content')
<h1 style="font-size:28px;font-weight: bold;color:navy">Ubah Slider</h1>
<div class="row">
  <div class="col-xl-9 col-lg-8">
    <div class="card shadow mb-4">
      <div class="card-body">
        <form action="{{route('settings.update', $settings->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group mb-2">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{$settings->judul}}">
          </div> 
          <div class="form-group mb-2">
            <label for="">Link</label>
            <input type="text" name="link" class="form-control" value="{{$settings->link}}">
          </div>
          <div class="form-group mb-2">
            <label for="">Image</label>
            <input type="file" name="images" class="form-control" id="image">
          </div>
          <a href="#" class="thumbnail">
            <img id="preview-image" src="{{asset($settings->images)}}" width="100%" height="200px">
          </a>
          <div class="modal-footer">
            <a href="{{route('settings.index')}}" class="btn btn-danger" data-dismiss="modal">Kembali</a>
            <button type="submit" class="btn btn-success">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>      
$(document).ready(function (e) {  
   $('#image').change(function(){           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]);   
   });
});
</script>
@endpush