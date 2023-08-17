@extends('layouts.backend')

@section('content')
<h1 style="font-size:28px;font-weight: bold;color:navy">Kategori</h1>
<div class="row">
	<div class="col-xl-3 col-lg-4">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
			</div>
			<div class="card-body">
				<form action="{{route('categories.store')}}" method="POST">
					@csrf
					<div class="form-group">
						<label for="kategori">Nama Kategori</label>
						<input type="text" class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label for="desc">Deskripsi</label>
						<textarea class="form-control" name="keterangan" rows="3"></textarea>
					</div>
					<button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> Buat Kategori</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xl-9 col-lg-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead class="bg-gradient-navy">
							<tr>
								<th width="5%">No</th>
								<th>Kategori</th>
								<th>Slug</th>
								<th>Deskripsi</th>
								<th>Create</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($categories as $rows)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$rows->nama}}</td>
								<td>{{$rows->slug}}</td>
								<td>{{$rows->keterangan}}</td>
								<td>{{date('d-m-Y', strtotime($rows->created_at))}}</td>
								<td style="text-align: center;">
				                    <div class="btn-group">
				                        <a href="{{ route('categories.edit', $rows->id)}}" class="btn btn-warning btn-sm">Edit</a>  &nbsp; 
				                        <form action="{{ route('categories.destroy', $rows->id)}}" method="post">
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
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
@endpush