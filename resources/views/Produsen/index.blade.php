@extends('layouts.dashboard')

@section('Nama_Produk')
  <h1 class="h3 mb-4 text-gray-800">Produsen</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">
  <div class="card-header py-3 bg-gradient-info">
    <h6 class="m-0 font-weight-bold text-light">Table</h6>
  </div>

  <div class="card-body">

    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <a href="{{ route('get.tambah.Produsen') }}" class="btn btn-info btn-icon-split">
      <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Data</span>
    </a>

    <hr>

    <div class="table-responsive">
      <table class="table table-bordered " id="dataTable " width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Lokasi</th>
              <th>Aksi</th>
            </tr>
        </thead>
          <tbody>
            @foreach($data_Produsen as $Produsen)
              <tr>
                <td>{{ $Produsen->id }}</td>
                <td>{{ $Produsen->nama }}</td>
                <td>{{ $Produsen->lokasi }}</td>
                <td class="text-nowrap">
                  <!-- Detail -->
                  <a href="{{ route('get.detail.Produsen', $Produsen->id) }}" class="btn btn-success" > 
                    <i class="fa fa-eye"></i>
                  </a>

                  <!-- Ubah -->
                  <a href="{{ route('get.ubah.Produsen', $Produsen->id) }}" class="btn btn-primary" > 
                    <i class="fa fa-edit"></i>
                  </a>

                  <!-- Delete -->
                  <form hidden action="{{ route('delete.Produsen', $Produsen->id)}}" method="post" id="data-ke-{{ $Produsen->id }}">
                    @csrf
                    @method('DELETE')
                    &nbsp;
                  </form>

                  <button class="btn btn-danger" onclick="deleteRow( {{ $Produsen->id }} )">
                    <i class="fas fa-trash"></i>
                  </button>

                  
                  &nbsp;

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
<!-- Add SweetAlert 2 CDN -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Delete Row -->
<script>
  function deleteRow(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#data-ke-'+id).submit()
      }
    })
  }
</script>

@endpush