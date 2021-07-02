@extends('layouts.base')

@section('isi')

<div class="container-fluid flex-center">
  <div class="col-10">
    <div class="card rounded-10 shadow">
      <div class="card-body rounded-10 bg-info d-flex justify-content-between align-items-center">
        <!-- title Section -->
        @if (Request::is('*/edit'))
        <h5 class="text-white my-1">Edit Berlangganan</h5>
        @elseif (Request::is('*/updown'))
        <h5 class="text-white my-1">Upgrade / Downgrade Langganan</h5>
        @elseif (Request::is('*/aktifkan'))
        <h5 class="text-white my-1">Aktifkan Kembali Langganan</h5>
        @endif
        <div class="col-3">
          <div class="input-group input-group-sm">
            <div class="input-group-prepend">
              <!-- id title Section -->
              <span class="input-group-text">ID</span>
            </div>
            <!-- id value Section -->
            <input type="text" class="form-control form-control-sm bg-dark text-white RobotoFont" id="id" name="id" readonly value="{{$id}}">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@if (Request::is('*/edit'))
<form method="POST" enctype="multipart/form-data" action="{{route('subscription.update',$id)}}">
  @csrf
  @method("PUT")
  @include($module->form)
</form>

@elseif (Request::is('*/updown'))
<form method="POST" enctype="multipart/form-data" action="{{route('subscription.updown_store')}}">
  @csrf
  @include($module->form)
</form>

@elseif (Request::is('*/aktifkan'))
<form method="POST" enctype="multipart/form-data" action="{{route('subscription.aktifkanUpdate',$id)}}">
  @csrf
  @method("PUT")
  @include($module->form)
</form>

@endif
@endsection