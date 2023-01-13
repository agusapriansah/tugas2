@extends('layouts.dashboard')

@section('Nama_Produk')
  <h1 class="h3 mb-4 text-gray-800">Produk</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
  </div>

  <div class="card-body">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <div class="row">
      <div class="col-md-3 text-md-right">
        <h5>Nama_Produk :</h5>
      </div>
      <div class="col">
        <label>{{ $detail_Produk->Nama_Produk }}</label>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 text-md-right">
        <h5>Jenis_Produk :</h5>
      </div>
      <div class="col">
        <label>{{ $detail_Produk->Jenis_Produk }}</label>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 text-md-right">
        <h5>Produsen :</h5>
      </div>
      <div class="col">
        <label>{{ $detail_Produk->Produsen->nama }}</label>
      </div>
    </div>

  </div>
</div>
@endsection