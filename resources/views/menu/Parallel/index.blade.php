@extends('menu.base_layout_menu')

@section('menu-header')
<h5 class="pt-2">DAFTAR PARALLEL PELANGGAN</h5>
@endsection

@section('menu-body')
<form class="col-12 bg-blue text-white py-4 form-filter form-filter-hide">
  @csrf

  <div class="form-row d-flex justify-content-center">
    <div class="col-3">
      <x-filterdate title="Awal Periode" id="start_date" name="start_date" />
    </div>
    <div class="col-3">
      <x-filterdate title="Akhir Periode" id="end_date" name="end_date" />
    </div>
  </div>

  <div class="form-row mt-2 d-flex justify-content-center">
    <div class="col-6 d-flex justify-content-end">
      <x-resetfilterbtn> Reset</x-resetfilterbtn>
    </div>
    <div class="col-6">
      <x-submitfilterbtn> Submit Filter</x-submitfilterbtn>
    </div>
  </div>

</form>

<div class="col-12 pt-4 pb-2">
  <form>
    @csrf
    {{ $dataTable->table() }}
  </form>
</div>
@endsection

@section('menu-footer')
<a href="/" class="btn btn-sm btn-success text-white">Export ke Excel</a>
<a href="/" class="btn btn-sm btn-success ml-3">Export ke PDF</a>
@endsection

@section('scripts')
{{ $dataTable->scripts() }}

<script>
  $(function() {
    const table = $('#parallel-table')
    
    table.on('preXhr.dt', function(e, settings, data){
      data.start_date = $('#start_date').val();
      data.end_date = $('#end_date').val();
      data.nama = $('#nama').val();
    });

    $('#generate').on('click', function() {
      table.on('preXhr.dt', function(e, settings, data){
        data.start_date = $('#start_date').val();
        data.end_date = $('#end_date').val();
      });

      table.DataTable().ajax.reload();
      return false;
    });

    $('#reset').on('click', function() {
      table.on('preXhr.dt', function(e, settings, data){
        data.start_date = '';
        data.end_date = '';
      });

      $('#start_date').val('');
      $('#end_date').val('');

      table.DataTable().ajax.reload();
      return false;

    });

    $('#nama').on('change', function() {
      table.DataTable().ajax.reload();
    });

  });
</script>
@endsection