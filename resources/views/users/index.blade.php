@extends('layouts.backend')

@section('content')
<h1 style="font-size:28px;font-weight: bold;color:navy">Users
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
<i class="fa fa-plus"></i> Tambah</a></h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-navy">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Email Verified</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                    <tr>
                        <td><img class="" src="{{ asset($item->avatar)}}" alt="Foto profil" width="60px"></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->is_admin}}</td>
                        <td>{{$item->email_verified_at}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>Edit | Delete</td>
                    </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-navy">
                <h5 class="modal-title" style="font-size:18px;font-weight: bold; color:#fff">Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
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
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
@endpush