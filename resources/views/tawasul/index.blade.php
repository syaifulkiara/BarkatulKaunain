@extends('layouts.backend')

@section('content')
<h1 style="font-size:28px;font-weight: bold;color:navy">Tawasul
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
<i class="fa fa-plus"></i> Buat Baru</a></h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-navy">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Keturunan</th>
                        <th>Create</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tawasul as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}} {{$item->bin}} {{$item->nama_bin}}</td>
                        <td>{{$item->silsilah->nama}}</td>
                        <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                        <td style="text-align: center;">
                            <div class="btn-group">
                                <a href="{{ route('tawasul.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>  &nbsp; 
                                <form action="{{ route('tawasul.destroy', $item->id)}}" method="post">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-navy">
                <h5 class="modal-title" style="font-size:18px;font-weight: bold; color:#fff">Tawasul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('tawasul.store')}}" method="POST">
                    @csrf
                      <div class="form-row">
                        <div class="form-group col-md-5">
                          <label for="inputCity">Nama</label>
                          <input type="text" class="form-control" name="nama" id="inputCity">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="inputState">Bin / Binti</label>
                          <select id="inputState" name="bin" class="form-control">
                            <option value="bin" selected>Bin</option>
                            <option value="binti">Binti</option>
                          </select>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="inputZip">Nama</label>
                          <input type="text" class="form-control" name="nama_bin" id="inputZip">
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="inputState">Keturunan</label>
                      <select id="inputState" name="silsilah_id" class="form-control">
                        <option value="">--Pilih Silsilah--</option>
                        @foreach($silsilah as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                      </select>
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