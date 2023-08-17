@extends('layouts.backend')

@section('content')
<h1 style="font-size:28px;font-weight: bold;color:navy">Artikel
<a href="{{route('artikel.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Buat Baru</a></h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-navy">
                    <tr>
                        <th width="5%">No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Create</th>
                        <th>Penulis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artikels as $rows)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img class="" src="{{asset($rows->gambar)}}" height="100"/></td>
                        <td>{{$rows->judul}}</td>
                        <td>{{$rows->category->nama}}</td>
                        <td>{{date('d-m-Y', strtotime($rows->created_at))}}</td>
                        <td>{{$rows->penulis}}</td>
                        <td style="text-align: center;">
                            <div class="btn-group">
                                <a href="{{ route('artikel.edit', $rows->id)}}" class="btn btn-warning btn-sm">Edit</a>  &nbsp; 
                                <form action="{{ route('artikel.destroy', $rows->id)}}" method="post">
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
@endsection
@push('scripts')
<script>
$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
@endpush