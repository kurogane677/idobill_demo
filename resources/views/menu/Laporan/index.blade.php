@extends('menu.custom_layout_menu')

@section('form')

<form target="_blank" id="form_laporan" method="POST" enctype="multipart/form-data">
  @csrf
  @endsection

  @section('menu-header')
  <h5 class="pt-2">Laporan</h5>
  @endsection

  @section('menu-body')
  <!-- Laporan -->
  <div class="input-group input-group-sm mb-2">
    <div class="input-group-prepend field170px">
      <span class="input-group-text field170px">Laporan</span>
    </div>
    <select class="form-control form-control-sm RobotoFont" id="tipe_laporan" name="tipe_laporan">
      <option value=""> - Pilih jenis laporan - </option>
      @if (count($tipe_laporan)>0)
      @foreach ($tipe_laporan as $id => $laporan)
      <option value="{{$id}}">{{$id . ' - ' . $laporan}}</option>
      @endforeach
      @endif
    </select>
  </div>

  <!-- Produk -->
  <x-selectprepend title="Produk" id="produk" name="produk" first="Semua produk" font="RobotoFont">
    @if (count($products)>0)
    @foreach ($products as $id => $produk)
    <option value="{{$id}}">{{$id . ' - ' . $produk}}</option>
    @endforeach
    @endif
  </x-selectprepend>

  <!-- Tipe Produk -->
  <x-selectprepend title="Tipe Produk" id="tipe_produk" name="tipe_produk" first="Semua tipe" font="RobotoFont">
    @if (count($tipe_produk)>0)
    @foreach ($tipe_produk as $key => $tipe)
    <option value="{{$key}}">{{$tipe}}</option>
    @endforeach
    @endif
  </x-selectprepend>

  <!-- Area -->
  <x-selectprepend title="Area" id="area" name="area" first="Semua area" font="RobotoFont">
    @if (count($areas)>0)
    @foreach ($areas as $id => $area)
    <option value="{{$id}}">{{$id . ' - ' . $area}}</option>
    @endforeach
    @endif
  </x-selectprepend>

  <!-- Status -->
  <div class="input-group input-group-sm mb-2" id="status_select" hidden>
    <div class="input-group-prepend field170px">
      <span class="input-group-text field170px">Status</span>
    </div>
    <select class="form-control form-control-sm RobotoFont" id="status" name="status">
      <option value="all"> - Semua status - </option>
      @if (count($status)>0)
      @foreach ($status as $id => $sts)
      <option value="{{$id}}">{{$sts}}</option>
      @endforeach
      @endif
    </select>
  </div>

  <div class="row">
    <div class="col-6">
      <!-- Awal Periode -->
      <x-inputprepend title="Awal Periode" type="date" id="start_date" name="start_date" value="{{old('start_date') ?? now()}}" opsi="required" />
    </div>
    <div class="col-6">
      <!-- Akhir Periode -->
      <x-inputprepend title="Akhir Periode" type="date" id="end_date" name="end_date" value="{{old('end_date') ?? now()}}" opsi="required" />
    </div>
  </div>

  @endsection

  @section('menu-footer')
  <button type="submit" id="print_btn" class="btn btn-success btn-sm" hidden>
    Print Preview
  </button>
  <a href="/exel" id="excel_btn" class="btn btn-info btn-sm ml-3" hidden>
    Export Excel
  </a>
  @endsection

  @section('close-form')
</form>
@endsection

@section('scripts')
<script>
  $(function() {
    $("#tipe_laporan").on('change', function(){
      tipe_laporan = $(this).val()
      if (tipe_laporan == '') {
        $("#print_btn").attr('hidden', true);
        $("#excel_btn").attr('hidden', true);
      } else {
        $("#print_btn").attr('hidden', false);
        $("#excel_btn").attr('hidden', false);
      }
      
      if (tipe_laporan != 'L017') {
        $("#status_select").attr('hidden', true);
      }
      else {
        $("#status_select").attr('hidden', false);
      }
      // switch (tipe_laporan){
      //   case tipe_laporan = 'L001':
      //     $("#status_select").attr('hidden', false);
      //     break;
      //   case tipe_laporan = 'L017':
      //     $("#status_select").attr('hidden', false);
      //     break;
      // }

      $("#form_laporan").attr('action', 'laporan/'+ tipe_laporan +'/preview')
    });
  });

</script>
@endsection