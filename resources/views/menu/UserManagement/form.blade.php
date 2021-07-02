<div class="row mt-4 d-flex justify-content-center">
  <input name="type" value="{{$type}}" hidden>

  @if ($type!='CUS')
  @if (!Request::is('*/GTI') && $type!='GTI' && !Request::is('*/SU') && $type!='SU')
  <div class="col-6">
    <div class="slope">
      @if ($type == 'GTI')
      <img src=" {{ asset('images/new_gti_user.jpg') }}" alt="GTI">
      @elseif ($type == 'LO')
      <img src=" {{ asset('images/new_lo_user.jpg') }}" alt="LO">
      @elseif ($type == 'PTN')
      <img src=" {{ asset('images/new_partner_user.jpg') }}" alt="Partner">
      @endif
    </div>
    <div class="w80px text-center">
      <span>{{$type}}</span>
    </div>

    <div class="text-center mb-2">
      @if (Request::is('*edit*'))
      <img src="/storage/group_logo/{{$group_company->group_logo}}" alt="logo" id="group_logo" style="width: 30%;">
      @else
      <img src="/storage/no_logo.png" alt="logo" id="group_logo" style="width: 30%;">
      @endif
    </div>
    <div class="row d-flex justify-content-center flex-column align-items-center">
      <h5 class="text-center">Informasi Group</h5>
      @if (Request::is('*/create/*'))
      <div class="col-4 text-center">
        <button id="lo-btn" type="button" class="btn btn-primary btn-sm" data-toggle="modal" @if (Request::is('*/LO')) data-target="#ModalsLO" @elseif (Request::is('*/PTN')) data-target="#ModalsPartner" @endif>
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#people-fill")}}" />
          </svg> &nbsp; Pilih Group
        </button>
      </div>
      @endif
    </div>
    @if (Request::is('*edit*'))
    <x-inputreadonly title="ID Group" ipname="group_id" value="{{$group_company->group_id}}" />
    <x-inputreadonly title="Nama" ipname="group_name" value="{{$group_company->group_name}}" />
    <x-inputreadonly title="Email" ipname="group_email" value="{{$group_company->group_email}}" />
    <x-inputreadonly title="No. Pelayanan" ipname="group_no_hp" value="{{$group_company->group_nohp_code}}{{$group_company->group_no_hp}}" />
    <x-inputreadonly title="Alamat" ipname="group_address" value="{{$group_company->group_address}}" />
    @else
    <x-inputreadonly title="ID Group" ipname="group_id" value="" />
    <x-inputreadonly title="Nama" ipname="group_name" value="" />
    <x-inputreadonly title="Email" ipname="group_email" value="" />
    <x-inputreadonly title="No. Pelayanan" ipname="group_no_hp" value="" />
    <x-inputreadonly title="Alamat" ipname="group_address" value="" />
    @endif
  </div>
  @endif
  @endif
  @if (Request::is('*/SU') || $type=='SU')
  <div class="col-2">
    <div class="slope">
      <img src="{{ asset('images/new_super_user.png') }}" alt="Super User">
    </div>
    <div class="w80px text-center">
      <span>User {{$type}}</span>
    </div>
  </div>
  @endif

  @if (Request::is('*/GTI') || $type=='GTI')
  <div class="col-2">
    <div class="slope">
      <img src=" {{ asset('images/new_gti_user.jpg') }}" alt="GTI">
    </div>
    <div class="w80px text-center">
      <span>User {{$type}}</span>
    </div>
  </div>
  @endif

  <div class="col-6">
    <!-- Upload Photo Profile -->
    @if (Request::is('*edit*'))
    <x-image-input title="Upload Photo Profile *" tempImg="temp_profile_img" value="{{ $user->profile_img ? ($user->profile_img ?? old('profile_img')) : 'no_img.png' }}" src="{{$user->profile_img ? '/storage/profile/'.$user->profile_img : $noImage}}" dbField="profile_img" noImage="{{$noImg}}" />
    @else
    <x-image-input title="Upload Photo Profile *" tempImg="temp_profile_img" value="no_img.png" src="{{$noImg}}" noImage="{{$noImg}}" dbField="profile_img" />
    @endif

    <!-- Nama -->
    <x-required-input title="Nama *" ipname="user_name" placeholder="" value="{{$user->user_name ?? old('user_name')}}" opsi="autofocus" />

    <!-- Email -->
    {{-- @if (Request::is('*edit*')) --}}
    <x-email-input value="{{$user->email ?? old('email')}}" />
    <script>
      var email ="{{$user->email ?? ''}}"
    </script>
    {{-- @endif --}}

    @if ($type!='CUS')
    <!-- Department -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Department *</span>
      </div>
      <select class="form-control form-control-sm" id="dept_id" name="dept_id">
        @foreach ($departments as $dept_id => $dept_name)
        @if (Request::is('*edit*'))
        <option value="{{$dept_id}}" {{($dept_id == $current_dept_id) ? 'selected' : '' }}>
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
    @endif

    <!-- Password -->
    @if (Request::is('*create*'))
    <x-password-input />
    @endif

    <!-- Mobile No. -->
    {{-- @if (Request::is('*edit*')) --}}
    <x-nohp-input codeValue="{{$user->nohp_code ?? old('nohp_code')}}" nohpValue="{{$user->no_hp ?? old('no_hp')}}" />
    <script>
      var no_hp ="{{$user->no_hp ?? ''}}"
    </script>
    {{-- @endif --}}

    @if ($type=='CUS')
    <!-- Telp No. -->
    <x-form-input title="Telp No." ipname="telp_rumah" value="{{$customer->telp_rumah ?? old('telp_rumah')}}" />
    @endif

    <!-- Tempat Lahir -->
    @if (Request::is('*edit*'))
    <x-form-input title="Tempat Lahir" ipname="tempat_lahir" placeholder="" value="{{$user->tempat_lahir}}" />
    @else
    <x-form-input title="Tempat Lahir" ipname="tempat_lahir" placeholder="" value="{{old('tempat_lahir')}}" />
    @endif

    <!-- Tgl Lahir -->
    @if (Request::is('*edit*'))
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
        @if (Request::is('*edit*'))
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
    @if (Request::is('*edit*'))
    <x-alamat-input title="Alamat" ipname="alamat" value="{{$user->alamat}}" />
    @else
    <x-alamat-input title="Alamat" ipname="alamat" value="{{old('alamat')}}" />
    @endif

    <!-- Kota -->
    @if (Request::is('*edit*'))
    <x-form-input title="Kota" ipname="kota" placeholder="" value="{{$user->kota}}" />
    @else
    <x-form-input title="Kota" ipname="kota" placeholder="" value="{{old('kota')}}" />
    @endif

    <!-- Kodepos -->
    @if (Request::is('*edit*'))
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
          {{ $updated_by }}
        </cite>
      </small>
    </footer>
    @endif
    @endif

    <input type="text" name="comefrom" value="{{$comefrom ?? ''}}" hidden>

  </div>
</div>

@if (Request::is('*/create/*'))

<!-- Modals:LO -->
<x-modals-with-table id="ModalsLO" title="Pilih LO">
  {!! $loTable->html()->table(['id' => 'createuserlogroup-table','class' => 'table table-striped']) !!}
</x-modals-with-table>

<!-- Modals:Partner -->
<x-modals-with-table id="ModalsPartner" title="Pilih Partner">
  {!! $partnerTable->html()->table(['id' => 'createuserpartnergroup-table','class' => 'table table-striped']) !!}
</x-modals-with-table>


{{ $loTable->html()->scripts() }}
{{ $partnerTable->html()->scripts() }}

<script>
  $(function() {
    $("#kodepos").keydown(function(event) {
        // Backspace
        if ( event.keyCode == 46 || event.keyCode == 8 ) {
        }
        else {
          // Angka
            if (event.keyCode < 48 || event.keyCode > 57 ) {
                event.preventDefault(); 
            }
        } 
    });
    $("#createuserlogroup-table, #createuserpartnergroup-table").children('tbody').on('click', function(e){
      let td = $(e.target).closest('tr').children('td');
      let group_logo = td.eq(0).find('img').attr('src');
      let group_id = td.eq(1).text();
      let group_name = td.eq(2).text();
      let group_email = td.eq(3).text();
      let group_no_hp = td.eq(4).text();
      let group_address = td.eq(5).text();

      if (!td.eq(0).text().includes('No data available'))
      {
        $("#group_logo").attr('src',group_logo);
        $("#group_id").val(group_id);
        $("#group_name").val(group_name);
        $("#group_email").val(group_email);
        $("#group_no_hp").val(group_no_hp);
        $("#group_address").val(group_address);
      }

      $("#ModalsLO, #ModalsPartner").modal('hide');

    });
  });

</script>

@endif