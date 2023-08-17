@extends('layouts.master')

@section('content')
<article class="main wrap mt-4">
<h1 class="page-title">Al Quran</h1>
<div class="table-responsive">
<table class="table table-bordered table-hover">
  <thead style="background-color: rgba(227, 77, 0, 1); color: white;">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Surah</th>
      <th scope="col">Arti</th>
      <th scope="col">Jumlah Ayat</th>
      <th scope="col">Audio</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($data as $rows)
    <tr>
      <th>{{ $rows['number_of_surah'] }}</th>
      <td>{{ $rows['name'] }}</td>
      <td>{{ $rows['name_translations']['id'] }}</td>
      <th>{{ $rows['number_of_ayah'] }}</th>
      <td>
      	<figure>
      		<audio src="{{ $rows['recitation'] }}" controls></audio>
      	</figure>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</article>
@endsection
@push('styles')
<link href="{{ asset('front/css/style.css')}}" rel="stylesheet">
@endpush