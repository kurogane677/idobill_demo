<div class="row mt-4">
  <div class="col-6">

    <!-- Nama Lengkap -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Nama Lengkap <sup class="text-danger">*</sup></span>
      </div>
      <input type="text" id="nama" name="nama" class="form-control form-control-sm @error('nama') is-invalid @enderror" placeholder="Sesuai dengan kartu identitas*" required value="{{ $gti->nama ?? old('nama') }}" autofocus onfocus="this.setSelectionRange(this.value.length,this.value.length);">
      @error('nama')
      <span class="invalid-feedback text-right" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <!-- Email -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Email <sup class="text-danger">*</sup></span>
      </div>

      <input type="email" id="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror " required value="{{ $user->email ?? old('email') }}">
      @error('email')
      <span class="invalid-feedback text-right" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    @if (Request::is('*/create'))
    <!-- Password -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Password <sup class="text-danger">*</sup></span>
      </div>
      <input type="password" id="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" required>
      @error('password')
      <span class="invalid-feedback text-right" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <!-- Confirm Password -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Confirm Password <sup class="text-danger">*</sup></span>
      </div>
      <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-sm @error('confirm_password') is-invalid @enderror" required>
      @error('confirm_password')
      <span class="invalid-feedback text-right" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    @endif

    @if ($user->group_id == 'GTI/ADM')
    <!-- Group -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Group <sup class="text-danger">*</sup></span>
      </div>
      @if (Request::is('profile/*'))
      <input type="text" id="group_desc" class="form-control form-control-sm" required value="{{ $group->group_id . ' - ' . $group->group_desc }}" disabled readonly>
      @else
      <select class="form-control form-control-sm" id="group_id" name="group_id" class="RobotoFont">
        @foreach ($groups as $group)
        <option value="{{ $group->group_id }}" class="RobotoFont" @isset($gti) {{ ($gti->group_id == $group->group_id) ? 'selected' : '' }} @endisset>
          {{ $group->group_id }} - {{ $group->group_desc }}
        </option>
        @endforeach
      </select>
      @endif
    </div>
    @endif

    <!-- No HP -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">No HP <sup class="text-danger">*</sup></span>
      </div>
      @if (Request::is('*/create'))
      <input type="text" id="nohp_code" name="nohp_code" value="+62" readonly>
      @else
      <input type="text" id="nohp_code" name="nohp_code" value="{{ $gti->nohp_code ?? old('nohp_code') }}" readonly>
      @endif
      <input type="tel" id="no_hp" name="no_hp" class="form-control form-control-sm @error('no_hp') is-invalid @enderror" required value="{{ $gti->no_hp ?? old('no_hp') }}">
      @error('no_hp')
      <span class="invalid-feedback text-right" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <!-- No TELP -->
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">No Telp </span>
      </div>
      @if (Request::is('*/create'))
      <input type="text" id="notelp_code" name="notelp_code" value="+62" readonly>
      @else
      <input id="notelp_code" readonly value="{{ $gti->notelp_code ?? old('notelp_code') }}">
      @endif

      <input type="tel" id="no_telp" name="no_telp" class="form-control form-control-sm" value="{{ $gti->no_telp ?? old('no_telp') }}">
    </div>

    <input type="text" name="temp_img" value="{{ $gti->profile_img ?? old('temp_img') }}" hidden>

    <!-- Upload Photo Profile -->
    <div class="form-group d-flex justify-content-between">
      <div class="input-group input-group-sm d-flex align-items-center">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Upload Photo Profile</span>
        </div>
        <input type="file" class="my-file-input transparent" id="profile_img" name="profile_img" onchange="previewFile(this)" accept=".png,.jpg,.jpeg" value="{{ $user->profile_img ?? old('profile_img') }}">
      </div>
      <button id="fotoPelanggan" type="button" data-toggle="modal" data-target="#fotoPelangganModal" class="d-flex justify-content-center align-items-center">
        <img id="previewImg" alt="upload" @if (isset($user) && $user->profile_img!=null) src="{{ ('/storage/uploads/profile_photos/'.$user->profile_img) }}" @else src="{{ ('/storage/uploads/profile_photos/no_img.png') }}" @endif>
      </button>
    </div>

  </div>

  <div class="col-6">
    <!-- No Identitas -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">No Identitas
      </div>
      <input type="text" class="form-control form-control-sm" id="no_identitas" name="no_identitas" value="{{ $gti->no_identitas ?? old('no_identitas') }}">
    </div>

    <!-- Tempat Lahir -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Tempat Lahir</span>
      </div>
      <input type="text" class="form-control form-control-sm" id="tempat_lahir" name="tempat_lahir" value="{{ $gti->tempat_lahir ?? old('tempat_lahir') }}">
    </div>

    <!-- Tanggal Lahir -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Tanggal Lahir</span>
      </div>
      <input type="date" class="form-control form-control-sm" id="tgl_lahir" name="tgl_lahir" value="{{ $gti->tgl_lahir ?? old('tgl_lahir') }}">
    </div>

    <!-- Gender -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Gender</span>
      </div>
      <select class="form-control form-control-sm" id="gender" name="gender">
        @foreach ($genders as $gender)
        @isset($gti)
        <option value="{{ $gender }}" {{ ( $gender == $gti->gender) ? 'selected' : '' }}>
          {{ $gender }}
        </option>
        @endisset
        @empty($gti)
        <option value="{{ $gender }}">
          {{ $gender }}
        </option>
        @endempty
        @endforeach
      </select>
    </div>

    <!-- Alamat -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Alamat</span>
      </div>
      <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $gti->alamat ?? old('alamat') }} </textarea>
    </div>

    <!-- Kota -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Kota</span>
      </div>
      <input type="text" class="form-control form-control-sm" id="kota" name="kota" value="{{ $gti->kota ?? old('kota') }}">
    </div>

    <!-- Kodepos -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Kodepos</span>
      </div>
      <input type="text" id="kodepos" name="kodepos" class="form-control form-control-sm" value="{{ $gti->kodepos ?? old('kodepos') }}">
    </div>

    @isset($gti)
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ $gti->updated_at }}
          oleh
          {{ $gti->name }}
        </cite>
      </small>
    </footer>
    @endisset

  </div>

</div>

<!-- Profile Image Modal -->
<div class="modal fade" id="fotoPelangganModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-0 d-flex justify-content-center" id="ZoomImg">
        <img @isset($user) @if ($user->profile_img == null)
        src="{{ ('/storage/uploads/profile_photos/no_img.png') }}"
        @else
        src="{{ ('/storage/uploads/profile_photos/'.$user->profile_img) }}"
        @endif
        @endisset
        src="{{ ('/storage/uploads/profile_photos/no_img.png') }}"
        alt="identitas" id="imgModal" onerror="this.onerror=null; this.src='{{ ('/storage/uploads/profile_photos/no_img.png') }}'">
      </div>
      <div class="modal-footer my-0 py-1">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function previewFile(input) {
  var fileName = document.getElementById("profile_img").value;
  var idxDot = fileName.lastIndexOf(".") + 1;
  var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
      var file = $("input[type=file]").get(0).files[0];
      if (file) {
        var reader = new FileReader();
        reader.onload = function(){
          $('#previewImg').attr("src",reader.result);
          $('#imgModal').attr("src",reader.result);
        }
        reader.readAsDataURL(file);
      }
      
    }else{
        alert("Upload hanya jpg/jpeg atau png file!");
    }   
  }
  
  $(function() {
    $("#nohp_code,#notelp_code").intlTelInput({
      // initial country
      initialCountry:"id",
      // the countries at the top of the list. defaults to united states and united kingdom
      preferredCountries: ["id"],
      

    });

    // console.log($(".intl-tel-input").children('input').val());

    // $(".intl-tel-input .flag-dropdown").on('click', function() {
    //   console.log($(this.parentElement).children('input').val());
    // });

  });
</script>