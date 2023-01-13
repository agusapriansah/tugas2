@extends('layouts.dashboard')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('Nama_Produk')
  <h1 class="h3 mb-4 text-gray-800">Produk</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Tambah</h6>
  </div>

  <div class="card-body">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif
    
    <form action="{{ route('post.proses-tambah.Produk') }}" method="post">
      @csrf

      <div class="form-group row">
        <label for="Nama_Produk" class="col-sm-2 col-form-label">Nama_Produk</label>

        <div class="col-sm-10">
          <input type="text" class="form-control @error('Nama_Produk') is-invalid @enderror" name="Nama_Produk" value="{{ old('Nama_Produk', '') }}">

          @error('Nama_Produk')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
        </div>
        
      </div>

      <div class="form-group row">
        <label for="Jenis_Produk" class="col-sm-2 col-form-label">Jenis_Produk</label>

        <div class="col-sm-10">
          <input type="text" class="form-control @error('Jenis_Produk') is-invalid @enderror" name="Jenis_Produk" value="{{ old('Jenis_Produk', '') }}">

          @error('Jenis_Produk')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
        </div>
        
      </div>

      <div class="form-group row">
        <label for="edisi_ke" class="col-sm-2 col-form-label">Produsen</label>

        <div class="col-sm-10">
          <select class="Produsen-id form-control custom-select" name="Produsen_ke">
            <option value="">Pilih Opsi</option>
            @foreach($data_Produsen as $Produsen)
              <option value="{{ $Produsen->id }}" {{ old('Produsen_id') == $Produsen->id ? 'selected' : '' }}>{{ $Produsen->nama }}</option>
            @endforeach
          </select>

          @error('Produsen_ke')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
        </div>
        
      </div>


      <button type="submit" class="btn btn-success">
        Simpan
      </button>

    </form>

  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('.Produsen-id').select2();
  });
</script>
@endpush