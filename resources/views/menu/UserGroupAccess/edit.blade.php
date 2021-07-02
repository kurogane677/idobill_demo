@extends('menu.custom_layout_menu')

@section('form')

<form method="POST" action="{{ route("ug_access.update", $id) }}">
  @csrf
  @method("PUT")
  @endsection

  @section('menu-header')
  <h5 class="pt-2">User Group Access</h5>
  <span class="badge badge-pill badge-warning">{{$access_name}}</span>
  @endsection

  @section('menu-body')
  <div class="col-12 pt-1 pb-2">
    {{ $dataTable->table() }}
  </div>
  @endsection

  @section('menu-footer')
  <a href={{ url("ug_management") }} class="btn btn-sm btn-dark">Back</a>
  <button type="submit" class="btn btn-sm btn-success ml-3">Save Changes</button>
  @endsection

  @section('close-form')
</form>
@endsection

@section('scripts')
{{ $dataTable->scripts() }}
@endsection