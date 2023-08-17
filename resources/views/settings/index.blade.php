@extends('layouts.backend')

@section('content')
<h1 style="font-size:28px;font-weight: bold;color:navy">Pengaturan Aplikasi</h1>
<div class="card shadow mb-4">
  <div class="card-body">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button style="font-size:14px;font-weight: bold;color:navy" class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Pengaturan Slidder</button>
      </li>
      <li class="nav-item" role="presentation">
        <button style="font-size:14px;font-weight: bold;color:navy" class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Pengaturan Website</button>
      </li>
      <li class="nav-item" role="presentation">
        <button style="font-size:14px;font-weight: bold;color:navy" class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Pengaturan Slidder</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="card">
          <div class="card-body">       
            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus"></i> Tambah</button>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-navy">
                  <tr>
                    <th>Image</th>
                    <th>Judul</th>
                    <th>Link Page</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($slider as $item)
                  <tr>
                    <td><img class="" src="{{ asset($item->images)}}" width="60px"></td>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->link}}</td>
                    <td style="text-align: center;">
                        <div class="btn-group">
                            <a href="{{ route('settings.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>  &nbsp; 
                            <form action="{{ route('settings.destroy', $item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin Mau Dhapus')" >Delete</button>
                            </form>
                        </div>  
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div> 
          </div>  
        </div>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="car">
          <div class="card-body">
            <form>
              <div class="form-group mb-2">
                <label for="">Nama Website</label>
                <input type="text" class="form-control" id="">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gradient-navy">
        <h5 class="modal-title" style="font-size:18px;font-weight: bold; color:#fff">Slidder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col">
              <div class="form-group mb-2">
                <label for="">Judul</label>
                <input type="text" name="judul" class="form-control" id="">
              </div> 
              <div class="form-group mb-2">
                <label for="">Link</label>
                <input type="text" name="link" class="form-control" id="">
              </div>
              <div class="form-group mb-2">
                <label for="">Image</label>
                <input type="file" name="images" class="form-control" id="image1">
              </div>
              <a href="#" class="thumbnail">
                <img id="preview-image-1" src="{{asset('back/img/300.png')}}" width="100%" height="200px">
              </a>
            </div>         
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>      
$(document).ready(function (e) {  
   $('#image1').change(function(){           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image-1').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]);   
   });

    $('#image2').change(function(){           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image-2').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]);   
   }); 

   $('#image3').change(function(){           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image-3').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]);   
   });

   $('#image4').change(function(){           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image-4').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]);   
   }); 

});
</script>

<script>
$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
@endpush