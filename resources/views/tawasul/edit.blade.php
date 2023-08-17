@extends('layouts.backend')

@section('content')
<h1 style="font-size:28px;font-weight: bold;color:navy">
<a href="{{route('tawasul.index')}}" class="btn btn-success btn-sm"><i class="fa fa-undo"></i> Back</a></h1>
<div class="row">
    <div class="col-xl-6 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{route('tawasul.update', $tawasul->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-5">
                          <label for="inputCity">Nama</label>
                          <input type="text" class="form-control" name="nama" value="{{$tawasul->nama}}" id="inputCity">
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
                          <input type="text" class="form-control" name="nama_bin" value="{{$tawasul->nama_bin}}" id="inputZip">
                        </div>
                      </div>  
                      <div class="form-group">
                      <label for="inputState">Keturunan</label>
                       <select id="inputState" name="silsilah_id" class="form-control">
                        <option value="">--Pilih Silsilah--</option>
                        @foreach($silsilah as $item)
                        <option value="{{ $item->id }}" {{ old('silsilah_id', $tawasul->silsilah_id) == $item->id ? 'selected' : '' }}>{{ ucfirst($item->nama) }}</option>
                        @endforeach
                      </select>
                    </div> 
                    <div class="modal-footer">
                        <a href="{{route('tawasul.index')}}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>       
@endsection