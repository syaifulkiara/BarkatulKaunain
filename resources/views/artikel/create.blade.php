@extends('layouts.backend')

@section('content')
<h1 style="font-size:28px;font-weight: bold;color:navy">Buat Artikel</h1>
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="row">
			<div class="col-xl-8 col-lg-7">                         
				<div class="card-body">
					<div class="">
						<form action="{{route('artikel.store')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control " name="judul" placeholder="Judul Artikel">
							</div>
							<div class="form-group">
								<select class="form-control" name="category_id">
									<option value="">--Pilih Category--</option>
									@foreach($categories as $item)
									<option value="{{$item->id}}">{{$item->nama}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<textarea cols="80" id="editor1" name="konten" rows="10"></textarea>
							</div>
						</div>
					</div>                                         
				</div>
				<div class="col-xl-4 col-lg-5">                                                                                    
					<div class="card-body">
						<div class="">
							<div class="form-group mb-0">
								<button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> Simpan</button>
								<a href="{{route('artikel.index')}}" class="btn btn-danger btn-block"> Batal</a>
							</div>
							<div class="form-group">
								<label class="mt-2 mb-0">Gambar</label>
								<input type="file" name="gambar" id="image" class="form-control">
							</div>
							<a href="#" class="thumbnail">
								<img id="preview-image-before-upload" src="{{asset('back/img/300.png')}}" width="100%">
							</a>
						</div>                                  
					</div>                           
				</div>
			</div>
		</div>
	</div>
</form> 

@endsection
@push('scripts')
<script src="{{ asset('back/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
  CKEDITOR.replace('editor1', {
    height: 380,
    removeButtons: 'PasteFromWord'
  });
</script>
<script>      
$(document).ready(function (e) {  
   $('#image').change(function(){           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]);   
   });  
});
</script>
@endpush