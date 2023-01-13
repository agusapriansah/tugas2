@extends('layouts.dashboard')

@section('judul')
  <h1 class="h3 mb-4 text-gray-800">Home</h1>
@endsection

@section('konten')


<div class="card shadow mb-4" >
  <div class="card-header py-3 bg-gradient-info">
    <h6 class="m-0 font-weight-bold text-light">Dashboard</h6>
  </div>

  <div class="card-body">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif

    Anda Berhasil Login !
      
   
  </div>
  
  
</div>
<div class="col-md-12 grid-margin stretch-card">
  <div class="card tale-bg">
   <img src="{{ asset('sb-admin-2/img/banner.jpg') }}" alt="people" height="">
  </div>
</div>

@endsection
