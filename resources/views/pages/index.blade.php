@extends('layouts.backend')

@section('content')
<h1 style="font-size:28px;font-weight: bold;color:navy">Halaman
<a href="{{route('pages.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Buat Baru</a></h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-navy">
                    <tr>
                        <th width="5%">No</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Konten</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $rows)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$rows->judul}}</td>
                        <td>{{$rows->slug}}</td>
                        <td>{!! Str::limit($rows->konten,100) !!}</td>
                        <td><img class="" src="{{asset($rows->gambar)}}" height="100"/></td>
                        <td style="text-align: center;">
                            <div class="btn-group">
                                <a href="{{ route('pages.edit', $rows->id)}}" class="btn btn-warning btn-sm">Edit</a>  &nbsp; 
                                <form action="{{ route('pages.destroy', $rows->id)}}" method="post">
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