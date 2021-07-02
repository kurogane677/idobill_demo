<div class="row mt-4 d-flex justify-content-center">
  <div class="col-6">
    <div class="text-center mb-2">
      <img src="/storage/group_logo/{{$LoGroup->group_logo}}" alt="logo" style="width: 30%;">
    </div>
    <h5 class="text-center">Informasi Group</h5>
    <x-inputreadonly title="ID Group" ipname="ID_Group" value="{{$LoGroup->group_id}}" />
    <x-inputreadonly title="Nama" ipname="Nama_Group" value="{{$LoGroup->group_name}}" />
    <x-inputreadonly title="Email" ipname="Email_Group" value="{{$LoGroup->group_email}}" />
    <x-inputreadonly title="No. Pelayanan" ipname="NoHP_Group" value="{{$LoGroup->group_nohp_code . $LoGroup->group_no_hp}}" />
    <x-inputreadonly title="Alamat" ipname="Alamat_Group" value="{{$LoGroup->group_address}}" />
  </div>
  <div class="col-6">

    <!-- Upload Photo Profile -->
    @if (Request::is('*/edit'))
    <x-image-input title="Upload Photo Profile *" tempImg="temp_profile_img" value="{{ $user->profile_img ? ($user->profile_img ?? old('profile_img')) : 'no_img.png' }}" src="{{$user->profile_img ? '/storage/profile/'.$user->profile_img : $noImage}}" dbField="profile_img" noImage="{{$noImg}}" />
    @else
    <x-image-input title="Upload Photo Profile *" tempImg="temp_profile_img" value="no_img.png" src="{{$noImg}}" noImage="{{$noImg}}" dbField="profile_img" />
    @endif

    <!-- Nama -->
    @if (Request::is('*/edit'))
    <x-form-input title="Nama *" ipname="user_name" placeholder="" value="{{$LoUser->user_name}}" opsi="required autofocus" />
    @else
    <x-form-input title="Nama *" ipname="user_name" placeholder="" value="{{old('user_name')}}" opsi="required autofocus" />
    @endif

    <!-- Email -->
    @if (Request::is('*/edit'))
    <x-email-input type="email" title="Email *" ipname="email" value="{{$user->email}}" opsi="required" />
    @else
    <x-email-input type="email" title="Email *" ipname="email" value="{{old('email')}}" opsi="required" />
    @endif

    <!-- Department -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Department *</span>
      </div>
      <select class="form-control form-control-sm" id="dept_id" name="dept_id">
        @foreach ($departments as $dept_id => $dept_name)
        @if (Request::is('*/edit'))
        <option value="{{$dept_id}}" {{($dept_id == $LoUser->dept_id) ? 'selected' : '' }}>
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

    <!-- Password -->
    @if (Request::is('*/create'))
    <div class="blockquote-footer text-right">
      <small class="text-muted">
        Password minimal 8 karakter
      </small>
    </div>
    <x-form-input type="password" title="Password *" ipname="password" opsi="required" />
    <x-form-input type="password" title="Konfirmasi password *" ipname="password_confirmation" opsi="required" />
    @endif

    <!-- Contact No. -->
    @if (Request::is('*/edit'))
    <x-hpno-input title="Contact No. *" codename="nohp_code" ipname="no_hp" code="{{$user->nohp_code}}" value="{{$user->no_hp}}" />
    @else
    <x-hpno-input title="Contact No. *" codename="nohp_code" ipname="no_hp" code="+62" value="{{old('no_hp')}}" />
    @endif

    <!-- Tempat Lahir -->
    @if (Request::is('*/edit'))
    <x-form-input title="Tempat Lahir" ipname="tempat_lahir" placeholder="" value="{{$user->tempat_lahir}}" />
    @else
    <x-form-input title="Tempat Lahir" ipname="tempat_lahir" placeholder="" value="{{old('tempat_lahir')}}" />
    @endif

    <!-- Tgl Lahir -->
    @if (Request::is('*/edit'))
    <x-form-input type="date" title="Tgl Lahir *" ipname="tgl_lahir" value="{{Carbon\Carbon::parse($user->tgl_lahir)->format('Y-m-d')}}" opsi="required" />
    @else
    <x-form-input type="date" title="Tgl Lahir *" ipname="tgl_lahir" value="{{old('tgl_lahir')}}" opsi="required" />
    @endif

    <!-- Gender -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Gender</span>
      </div>
      <select class="form-control form-control-sm" id="gender" name="gender">
        @foreach ($genders as $gender)
        @if (Request::is('*/edit'))
        <option value="{{$gender}}" {{ ( $gender == $user->gender) ? 'selected' : '' }}>
          {{ strtoupper($gender) }}
        </option>
        @else
        <option value="{{ $gender }}">
          {{ strtoupper($gender) }}
        </option>
        @endif
        @endforeach
      </select>
    </div>

    <!-- Alamat -->
    @if (Request::is('*/edit'))
    <x-alamat-input title="Alamat" ipname="alamat" value="{{$user->alamat}}" />
    @else
    <x-alamat-input title="Alamat" ipname="alamat" value="{{old('alamat')}}" />
    @endif

    <!-- Kota -->
    @if (Request::is('*/edit'))
    <x-form-input title="Kota" ipname="kota" placeholder="" value="{{$user->kota}}" />
    @else
    <x-form-input title="Kota" ipname="kota" placeholder="" value="{{old('kota')}}" />
    @endif

    <!-- Kodepos -->
    @if (Request::is('*/edit'))
    <x-form-input title="Kodepos" ipname="kodepos" placeholder="" value="{{$user->kodepos}}" />
    @else
    <x-form-input title="Kodepos" ipname="kodepos" placeholder="" value="{{old('kodepos')}}" />
    @endif

    @if (Request::is('*edit*'))
    @if ($updated_by != '')
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ Carbon\Carbon::parse($user->updated_at)->format('d M Y H:i:s') }}
          oleh
          {{$updated_by}}
        </cite>
      </small>
    </footer>
    @endif
    @endif

  </div>
</div>