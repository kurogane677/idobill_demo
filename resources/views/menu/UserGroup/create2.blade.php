@extends('menu.custom_layout_menu')

@section('form')
<form method="POST" action="/ug_management">
  @csrf
  @endsection

  @section('menu-header')
  <h5 class="pt-2">Create Group</h5>
  @endsection

  @section('menu-body')
  @include('Navigations.alert')
  <h6 class="text-center my-4"><strong>Untuk ID Group, isi inisial group saja di bagian kiri, nama departemen dibagian kanan. Contoh PLN01, GTI02, LO03, etc.</strong></h6>

  <div class="row d-flex justify-content-center">
    <div class="col-8">
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">ID Group
        </div>
        <input type="text" class="form-control form-control-sm @error('group_id') is-invalid @enderror" id="group_id" name="group_id" value="{{ old("group_id") }}" placeholder="contoh ID Group : GTI, LO, PTN" maxlength="3" autofocus>
        @error('group_id')
        <span class="invalid-feedback text-right" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      {{-- <h6>contoh ID Group : GTI/ADM</h6> --}}

      <!-- Department -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Department *</span>
        </div>
        <select class="form-control form-control-sm" id="dept_id" name="dept_id">
          @foreach ($departments as $dept_id => $dept_name)
          @if (Request::is('*/edit'))
          <option value="{{$dept_id}}" {{($dept_id == $PartnerUser->dept_id) ? 'selected' : '' }}>
            {{$dept_name}}
          </option>
          @else
          <option value="{{$dept_id}}">
            {{$dept_name}}
          </option>
          @endif
          @endforeach
        </select>
      </div>

      <div class=" input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Group Description
        </div>
        <input type="text" id="group_desc" name="group_desc" class="form-control form-control-sm @error('group_desc') is-invalid @enderror" value="{{ old("group_desc") }}" placeholder="contoh nama group : GTI ADMIN, LO TEKNISI" maxlength="15">
        @error('group_desc')
        <span class="invalid-feedback text-right" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
  </div>
  @endsection

  @section('menu-footer')
  <a href="{{ url('ug_management') }}" class="btn btn-dark btn-sm">
    Cancel
  </a>
  <button type="submit" class="btn btn-success btn-sm ml-3">Create</button>
  @endsection

  @section('close-form')
</form>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $('#group_id, #group_desc').on('input', function(evt) {
      $(this).val(function(_, val) {
        return val.toUpperCase();
      });
    });
  });
</script>
@endsection