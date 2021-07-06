@extends('menu.base_layout_menu')

@section('page-title')
&nbsp;- User Group Management
@endsection

@section('menu-header')
<h5 class="pt-2">User Group Manager</h5>
@endsection


@section('filter-button')
{{-- <x-showfilterboxbtn /> --}}
@endsection

@section('filter-menu')
<form class="col-12 bg-blue text-white py-4 form-filter form-filter-hide">
  @csrf

  <div class="form-row d-flex justify-content-center">
    <div class="col-3">
      <span>Group Akses</span>
    </div>
  </div>

  <div class="form-row d-flex justify-content-center">
    <div class="col-3">
      <select name="a" id="a" class="form-control form-control-sm">
        <option value="all"> - Pilih Area - </option>
        <option value="1">Equal</option>
        <option value="2">Less Than</option>
        <option value="3">Greater Than</option>
      </select>
    </div>
  </div>

  <div class="form-row mt-2 d-flex justify-content-center">
    <div class="col-3 d-flex justify-content-center">
      <x-resetfilterbtn> Reset</x-resetfilterbtn>
      <div class="ml-2"></div>
      <x-submitfilterbtn> Submit Filter</x-submitfilterbtn>
    </div>
  </div>

</form>
@endsection

@section('menu-body')
<div class="col-12 pt-4 pb-2">
  <form>
    {{ $dataTable->table() }}
  </form>
</div>
@endsection

@section('menu-footer')
<div class="card-footer d-flex justify-content-end align-items-center">
  <a href="{{route($module->route.".create")}}" class="btn btn-sm btn-success text-white ml-3">
    + Tambah Group Baru
  </a>
</div>
@endsection

@section('scripts')
{{ $dataTable->scripts() }}
@endsection