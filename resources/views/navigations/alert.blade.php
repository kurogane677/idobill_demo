<!-- ALSERT SUKSES -->
@if (session('success'))
<div class="box-alert">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif

<!-- ALSERT ERROR -->
@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
  <strong>Error! Data tidak dapat diproses, silahkan ditinjau kembali:</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <ul class="pl-4 mb-0">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif