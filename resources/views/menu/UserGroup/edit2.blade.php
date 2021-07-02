@extends('menu.custom_layout_menu')

@section('form')
<form method="POST" action="{{ route("ug_management.update", $id) }}">
  @csrf
  @method("PUT")
  @endsection

  @section('menu-header')
  <h5 class="pt-2">Edit Group</h5>
  @endsection

  @section('menu-body')
  <div class="row d-flex justify-content-center">
    <div class="col-8">
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">ID Group
        </div>
        <input type="text" class="form-control form-control-sm" value="{{ $id }}" readonly disabled>
      </div>

      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Group Description
        </div>
        <input type="text" id="group_desc" name="group_desc" class="form-control form-control-sm" value="{{ $group_desc }}" autofocus>
      </div>
    </div>
  </div>
  @endsection

  @section('menu-footer')
  <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm">
    Cancel
  </a>
  <button type="submit" class="btn btn-success btn-sm ml-3">Save</button>
  @endsection

  @section('close-form')
</form>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    var input = $("#group_desc");
    var len = input.val().length;
    input[0].focus();
    input[0].setSelectionRange(len, len);
  });
</script>
@endsection