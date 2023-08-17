@extends('layouts.backend')

@section('content')
<h1 style="font-size:28px;font-weight: bold;color:navy">
<a href="{{route('silsilah.index')}}" class="btn btn-success btn-sm"><i class="fa fa-undo"></i> Back</a></h1>
<div class="row">
    <div class="col-xl-5 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{route('silsilah.update', $silsilah->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{$silsilah->nama}}" required>
                    </div>   
                    <div class="modal-footer">
                        <a href="{{route('silsilah.index')}}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>       
@endsection
