<div class="row mt-4">
  <div class="col-6">

    <!-- Upload Photo Profile -->
    @if (Request::is('*edit*'))
    <x-image-input title="Upload Photo Profile" tempImg="temp_profile_img" value="{{ $user->profile_img ? ($user->profile_img ?? old('profile_img')) : 'no_img.png' }}" src="{{$user->profile_img ? '/storage/profile/'.$user->profile_img : $noImage}}" noImage="{{$noImg}}" dbField="profile_img" />
    @else
    <x-image-input title="Upload Photo Profile" tempImg="temp_profile_img" value="no_img.png" src="{{$noImg}}" noImage="{{$noImg}}" dbField="profile_img" />
    @endif

    <!-- No. Registrasi -->
    @if (Request::is('*edit*'))
    <x-form-input title="No. Registrasi" ipname="cust_reg_no" value="{{$customer->cust_reg_no}}" />
    @else
    <x-form-input title="No. Registrasi" ipname="cust_reg_no" value="{{old('cust_reg_no')}}" />
    @endif

    <!-- Tipe Pelanggan -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Tipe Pelanggan</span>
      </div>
      <select class="form-control form-control-sm" id="cust_type" name="cust_type" @if (Request::is('*edit*')) disabled @endif>
        @foreach ($cust_type as $id => $type)
        @if (Request::is('*edit*'))
        <option value="{{$id}}" {{ ($id == $customer->cust_type) ? 'selected' : '' }}>
          {{$type}}
        </option>
        @else
        <option value="{{$id}}">
          {{$type}}
        </option>
        @endif
        @endforeach
      </select>
    </div>

    <!-- Nama Perusahaan -->
    @if (Request::is('*create*'))
    <x-form-input title="Nama Perusahaan" ipname="company_name" placeholder="Hanya untuk jenis pelanggan corporate" value="{{$customer->company_name ?? old('company_name')}}" />
    @elseif (Request::is('*edit*') && $customer->cust_type == 0)
    <x-form-input title="Nama Perusahaan" ipname="company_name" placeholder="Hanya untuk jenis pelanggan corporate" value="{{$customer->company_name ?? old('company_name')}}" opsi="disabled" />
    @endif

    <!-- Nama Lengkap -->
    <x-required-input title="Nama Lengkap *" ipname="cust_name" placeholder="Sesuai dengan kartu identitas" value="{{$customer->cust_name ?? old('cust_name')}}" />

    @if (Request::is('*create*'))
    <div class="custom-control custom-switch ml-3">
      <input type="checkbox" class="custom-control-input" id="no_email">
      <label class="custom-control-label pt-1" for="no_email">
        Saya tidak memiliki Email. System akan generate email secara random
      </label>
    </div>
    @endif

    <!-- Email -->
    <x-email-input value="{{$user->email ?? old('email')}}" />
    <script>
      var email ="{{$user->email ?? ''}}"
    </script>

    <!-- Password -->
    @if (Request::is('*create*'))
    <x-password-input />
    @endif

    <!-- No HP -->
    <x-nohp-input codeValue="{{$user->nohp_code ?? old('nohp_code')}}" nohpValue="{{$user->no_hp ?? old('no_hp')}}" />
    <script>
      var no_hp ="{{$user->no_hp ?? ''}}"
    </script>

    <!-- Telp No. -->
    <x-form-input title="Telp No." ipname="telp_rumah" value="{{$customer->telp_rumah ?? old('telp_rumah')}}" />

    <!-- Tempat Lahir -->
    <x-form-input title="Tempat Lahir" ipname="tempat_lahir" value="{{$user->tempat_lahir ?? old('tempat_lahir')}}" />

    <!-- Tgl Lahir -->
    @if (Request::is('*edit*'))
    <x-form-input type="date" title="Tanggal Lahir" ipname="tgl_lahir" value="{{Carbon\Carbon::parse($user->tgl_lahir)->format('Y-m-d')}}" />
    @else
    <x-inputprepend title="Tanggal Lahir" type="date" id="tgl_lahir" name="tgl_lahir" value="{{old('tgl_lahir') ?? now()}}" />
    @endif

    <!-- Gender -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Gender</span>
      </div>
      <select class="form-control form-control-sm" id="gender" name="gender">
        @foreach ($genders as $gender)
        @if (Request::is('*edit*'))
        <option value="{{$gender}}" {{($gender == $user->gender) ? 'selected' : '' }}>
          {{$gender}}
        </option>
        @else
        <option value="{{$gender}}">
          {{$gender}}
        </option>
        @endif
        @endforeach
      </select>
    </div>

    <!-- No. Rekening Listrik -->
    @if (Request::is('*edit*'))
    <x-form-input title="No. Rekening Listrik" ipname="rek_listrik" value="{{$customer->rek_listrik}}" />
    @else
    <x-form-input title="No. Rekening Listrik" ipname="rek_listrik" value="{{old('rek_listrik')}}" />
    @endif

    <!-- Pekerjaan -->
    @if (Request::is('*edit*'))
    <x-form-input title="Pekerjaan" ipname="pekerjaan" value="{{$customer->pekerjaan}}" />
    @else
    <x-form-input title="Pekerjaan" ipname="pekerjaan" value="{{old('pekerjaan')}}" />
    @endif


  </div>

  <div class="col-6">

    <!-- Upload Kartu Identitas -->
    @if (Request::is('*edit*'))
    <x-image-input title="Upload Kartu Identitas" tempImg="temp_identity_img" value="{{ $customer->identity_img ? ($customer->identity_img ?? old('identity_img')) : 'no_img.png' }}" src="{{$customer->identity_img ? '/storage/identity/'.$user->profile_img : $noImage}}" noImage="{{$noImg}}" dbField="identity_img" />
    @else
    <x-image-input title="Upload Kartu Identitas" tempImg="temp_identity_img" value="no_img.png" src="{{$noImg}}" noImage="{{$noImg}}" dbField="identity_img" />
    @endif

    <!-- No Identitas -->
    <x-identity-input id="cust_identity_no" value="{{$customer->cust_identity_no ?? old('cust_identity_no') }}" />
    <script>
      var cust_identity_no ="{{$customer->cust_identity_no ?? ''}}"
    </script>

    <!-- Status Kepemilikan Tempat Tinggal -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text">Status Kepemilikan Tempat Tinggal</span>
      </div>
      <select class="form-control form-control-sm" id="status_rumah" name="status_rumah">
        @foreach ($status_rumah as $sts)
        @if (Request::is('*edit*'))
        <option value="{{$sts}}" {{($sts == $customer->status_rumah) ? 'selected' : '' }}>
          {{strtoupper($sts)}}
        </option>
        @else
        <option value="{{$sts}}">
          {{strtoupper($sts)}}
        </option>
        @endif
        @endforeach
      </select>
    </div>

    <!-- Lama Menetap -->
    <x-form-input title="Lama Menetap" ipname="lama_menetap" value="{{$customer->lama_menetap ?? old('lama_menetap')}}" />

    <!-- Jam untuk telp pelanggan -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Jam telp pelanggan</span>
      </div>
      <select class="form-control form-control-sm" id="jam_telp" name="jam_telp">
        @foreach ($jam_telps as $jam_telp)
        @if (Request::is('*edit*'))
        <option value="{{ $jam_telp }}" {{ ( $jam_telp == $customer->jam_telp) ? 'selected' : '' }}>
          {{ strtoupper($jam_telp) }}
        </option>
        @else
        <option value="{{ $jam_telp }}">
          {{ strtoupper($jam_telp) }}
        </option>
        @endif
        @endforeach
      </select>
    </div>

    <!-- Area Pelanggan -->
    <div class="row">
      <div class="col-9">
        <input type="text" id="area_id" name="area_id" value="{{$area->area_id ?? old('area_id')}}" hidden>
        <x-required-input title="Area Pelanggan *" ipname="area_name" value="{{$area->area_name ?? old('area_name')}}" opsi="readonly" />
      </div>
      <div class="col-3 p-0">
        @if (Request::is('*create*'))
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalsArea">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#geo-alt")}}" />
          </svg> &nbsp; Pilih Area
        </button>
        @endif
      </div>
    </div>

    <!-- Wilayah Pelanggan -->
    <input type="text" id="wilayah_id" name="wilayah_id" value="{{$area->wilayah_id ?? old('wilayah_id')}}" hidden>
    <x-required-input title="Wilayah Pelanggan *" ipname="wilayah_name" value="{{$area->wilayah_name ?? old('wilayah_name')}}" opsi="readonly" />

    <!-- Alamat -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Alamat</span>
      </div>
      @if (Request::is('*edit*'))
      <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $user->alamat ?? old('alamat') }} </textarea>
      @else
      <textarea class="form-control" id="alamat" name="alamat" rows="3">{{old('alamat')}} </textarea>
      @endif
    </div>

    <!-- Kota -->
    @if (Request::is('*edit*'))
    <x-form-input title="Kota" ipname="kota" value="{{$user->kota}}" />
    @else
    <x-form-input title="Kota" ipname="kota" value="{{old('kota')}}" />
    @endif

    <!-- Kodepos -->
    @if (Request::is('*edit*'))
    <x-form-input title="Kodepos" ipname="kodepos" value="{{$user->kodepos}}" />
    @else
    <x-form-input title="Kodepos" ipname="kodepos" value="{{old('kodepos')}}" />
    @endif

    <!-- Cara Pembayaran -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Cara Pembayaran</span>
      </div>
      <select class="form-control form-control-sm" id="cara_bayar_id" name="cara_bayar_id">
        @foreach ($cara_bayar as $cara_bayar_id => $cara_bayar_name)
        @if (Request::is('*edit*'))
        <option value="{{$cara_bayar_id}}" {{ ( $cara_bayar_id == $customer->cara_bayar_id) ? 'selected' : '' }}>
          {{$cara_bayar_name}}
        </option>
        @else
        <option value="{{$cara_bayar_id}}">
          {{$cara_bayar_name}}
        </option>
        @endif
        @endforeach
      </select>
    </div>

    <!-- Jenis Pembayaran -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Jenis Pembayaran</span>
      </div>
      <select class="form-control form-control-sm" id="jenis_bayar_id" name="jenis_bayar_id">
        @foreach ($jenis_pembayaran as $jenis_bayar_id => $jenis_bayar_name)
        @if (Request::is('*edit*'))
        <option value="{{$jenis_bayar_id}}" {{ ( $jenis_bayar_id == $customer->jenis_bayar_id) ? 'selected' : '' }}>
          {{$jenis_bayar_name}}
        </option>
        @else
        <option value="{{$jenis_bayar_id}}">
          {{$jenis_bayar_name}}
        </option>
        @endif
        @endforeach
      </select>
    </div>

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

    <input type="text" id="cust_reg_by" name="cust_reg_by" value="{{$GroupID}}" hidden>

  </div>
</div>
@if (Request::is('*create*'))
<!-- Modals:Area -->
<x-modals-with-table id="ModalsArea" title="Pilih Area" modalSize="modal-lg">
  {!! $dataTable->table(['class' => 'table table-striped']) !!}
</x-modals-with-table>
{{ $dataTable->scripts() }}
@endif

<script type="text/javascript">
  $(function() {
    $("#kodepos").keypress(function(event) {
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
      if ($("#cust_type").val()==0){
          $( "#company_name" ).prop( "disabled", true );
      }
      
      $("#cust_type").on('change', function(){
        if ($(this).val()==0){
          $( "#company_name" ).prop( "disabled", true );
          $( "#company_name" ).val("");
        } else {
          $( "#company_name" ).prop( "disabled", false );
        }
      });

      $("#no_email").on('click', function(){
        if ($("#cust_name").val() == '')
        {
          alert("Silahkan isi nama anda terlebih dahulu");
          return false;
        }
        let cust_name = $("#cust_name").val().split(" ")[0].toLowerCase();
        let r = Math.random().toString(36).substring(4);
        $("#email").val(cust_name + '.' + r + '@idobill.com');
        let el = $("#email");
        validateEmail(el);
      });

      $("#customerarea-table").children('tbody').on('click', function(e){
        let td = $(e.target).closest('tr').children('td');
        let area_id = td.eq(0).text();
        let area_name = td.eq(1).text();
        let wilayah_id = td.eq(2).text();
        let wilayah_name = td.eq(3).text();

        if (area_id.includes('No data available'))
        {
          area_id = '';
          area_name = '';
          wilayah_id = '';
          wilayah_name = '';
        }

        $("#area_id").val(area_id);
        $("#area_name").val(area_name);
        $("#wilayah_id").val(wilayah_id);
        $("#wilayah_name").val(wilayah_name);
      
        $("#ModalsArea").modal('toggle');

        valid($("#area_name"));
        valid($("#wilayah_name"));

      });
    });
</script>