@extends('layouts.app')
<!-- Content Section -->
@section('content')
<div class="container-fluid">

  <div class="formulir-full bg-white">
    <div class="col-12 mt-3 xx">

      <div class="d-flex justify-content-end">
        <button type="button" id="btnPrint" class="btn btn-sm btn-warning" onclick="window.print();">Print</button>
        <a href="/subscription" class="btn btn-sm btn-dark ml-3" id="btnClose">Close</a>
      </div>
      <div id="logo_formulir_pendaftaran" hidden>
        <img src="{{ asset('images/logo_erb.png') }}" alt="ERB" />
      </div>
      <p class="lead text-center">KONTRAK TV KABEL / BROADBAND INTERNET</p>

      <table class="tblformulir_pendaftaran" style="width: 100%;">
        <thead>
          <tr>
            <th colspan="3" class="py-0">DATA PRIBADI PELANGGAN</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="w35p">Nama Lengkap ( sesuai dengan kartu identitas ) </td>
            <td class="w1p">:</td>
            <td class="w64p">{{$pelanggan->nama}}</td>
          </tr>
          <tr>
            <td>No Kartu Identitas </td>
            <td>:</td>
            <td>{{$pelanggan->no_identitas}}</td>
          </tr>
          <tr>
            <td>Tempat Lahir </td>
            <td>:</td>
            <td>{{$pelanggan->tempat_lahir}}</td>
          </tr>
          <tr>
            <td>Tanggal Lahir </td>
            <td>:</td>
            <td>{{ date('d-m-Y', strtotime($pelanggan->tgl_lahir)) }}</td>
          </tr>
          <tr>
            <td>Alamat ( rumah sekarang ) </td>
            <td>:</td>
            <td>{{$pelanggan->alamat}}</td>
          </tr>
          <tr>
            <td>Kota</td>
            <td>:</td>
            <td>{{$pelanggan->kota}}</td>
          </tr>
          <tr>
            <td>Kodepos</td>
            <td>:</td>
            <td>{{$pelanggan->kodepos}}</td>
          </tr>
          <tr>
            <td>Status Rumah </td>
            <td>:</td>
            <td>{{$pelanggan->status_rumah}}</td>
          </tr>
          <tr>
            <td>Lama Menetap </td>
            <td>:</td>
            <td>{{$pelanggan->lama_menetap}}</td>
          </tr>
          <tr>
            <td>Telp Rumah </td>
            <td>:</td>
            <td>{{$pelanggan->telp_rumah}}</td>
          </tr>
          <tr>
            <td>No HP </td>
            <td>:</td>
            <td>{{$pelanggan->hp}}</td>
          </tr>
          <tr>
            <td>Jam berapa kami sebaiknya menelepon anda? </td>
            <td>:</td>
            <td>{{$pelanggan->jam_telp}} WIB</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{$pelanggan->email}}</td>
          </tr>
        </tbody>
      </table>

      <table class="tblformulir_pendaftaran" style="width: 100%; ">
        <thead>
          <tr>
            <th colspan="3" class="py-0">PELANGGAN TV KABEL / INTERNET BROADBAND ( WAJIB DIISI )</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="w35p">Nama perusahaan / pribadi </td>
            <td class="w1p">:</td>
            <td class="w64p">{{$pelanggan->nama_perusahaan}}</td>
          </tr>
          <tr>
            <td>Alamat </td>
            <td>:</td>
            <td>{{$pelanggan->alamat}}</td>
          </tr>
          <tr>
            <td>Kota </td>
            <td>:</td>
            <td>{{$pelanggan->kota}}</td>
          </tr>
          <tr>
            <td>Kodepos </td>
            <td>:</td>
            <td>{{$pelanggan->kodepos}}</td>
          </tr>
          <tr>
            <td>Telephone </td>
            <td>:</td>
            <td>{{$pelanggan->telp_rumah}}</td>
          </tr>
        </tbody>
      </table>

      <table class="tblformulir_pendaftaran" style="width: 100%; ">
        <thead>
          <tr>
            <th colspan="3" class="py-0">DATA PERNYATAAN</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="3"># Saya menyatakan bahwa data pribadi yang saya berikan di atas adalah yang sebenar - benarnya. Saya setuju menyambung / memasang TV Kabel & Internet Broadband dengan siaran televisi swasta nasional indonesia</td>
          </tr>
          <tr>
            <td class="w35p">No Pelanggan </td>
            <td class="w1p">:</td>
            <td class="w64p">{{ $pelanggan->id_cust }}</td>
          </tr>
          <tr>
            <td>Saya setuju membayar biaya pemasangan / registrasi sebesar </td>
            <td>:</td>
            <td>Rp. {{ $request->total }}</td>
          </tr>
          <tr>
            <td>Tanggal Kontrak </td>
            <td>:</td>
            <td>{{ $request->created_at }}</td>
          </tr>
          <tr>
            <td>Status Pelanggan </td>
            <td>:</td>
            <td>{{$pelanggan->status_cust}}</td>
          </tr>
          <tr>
            <td>Sistem Pembayaran </td>
            <td>:</td>
            <td>Collect</td>
          </tr>
          <tr>
            <td colspan="3"># Sistem pembayaran collect dikenakan biaya Rp 5.000,00 </td>
          </tr>
          <tr>
            <td colspan="3"># Harga diatas bukanlah kontrak tetap, harga dapat berubah sewaktu - waktu sesuai dengan peraturan PT. EFORINDO Lintas Media yang berlaku. </td>
          </tr>
          <tr>
            <td colspan="3">Demikian kontrak ini dibuat tanpa adanya unsur paksaan dari pihak manapun </td>
          </tr>
        </tbody>
      </table>
      <br>
      <div class="col-12 d-flex justify-content-center">
        <div class="col-3">
          <div class="card">
            <div class="card-header">
              Tanda Tangan Pelanggan
            </div>
            <div class="card-body">
              <br>
              <br>
              <br>
              <div class="signline"></div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <div class="card-header">
              Tanda Tangan Marketing
            </div>
            <div class="card-body">
              <br>
              <br>
              <br>
              <div class="signline"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-4 col-12 d-flex justify-content-center">
        {{-- @include('Navigations.footer') --}}
      </div>


    </div>
  </div>
</div>




@endsection