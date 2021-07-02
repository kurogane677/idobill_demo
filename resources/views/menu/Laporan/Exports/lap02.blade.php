@extends('layouts.preview_layout')

@section('content')
<div class="container-fluid">

  <div class="button_place">
    <button type="button" id="btnPrint" class="btn btn-sm btn-info" onclick="window.print();">Print</button>
    {{-- <button type="button" id="btnExport" class="btn btn-sm btn-info" onclick="window.download();">Eksport</button> --}}
    <button type="button" id="btnClose" class="btn btn-sm btn-danger ml-2" onclick="window.close();">Close</button>
  </div>

  <img id="logo" src="{{asset('images/grahakomindo_logo.png')}}" alt="logo" />

  <div class="title text-center pt-3">
    <h4>PT. ELLYS RETAILINDO BINTANG</h4>
    <h6>Jl. Imam Bonjol, Nagoya Point No.7, Kampung Utama, Nagoya Batam 29444 Indonesia</h6>
    <h6>Telp: (0778) 7064638, 431889. Fax. 0778 431889 www.erb.co.id</h6>
  </div>
  <hr>

  <h5 class="text-center"><strong>LAPORAN DATA PELANGGAN AKTIF</strong></h5><br/>

  <!-- Table Header -->
  <table id="table_preview_title" class="table_preview table-borderless" style="font-size: 0.85rem;">
    <tbody>
      @isset($request)
      <tr>
        <td>Tanggal Cetak</td>
        <td style="width: 80px;"></td>
        <td>: {{date('l, d-m-Y')}}</td>
      </tr>
      <tr>
        <td>Periode</td>
        <td style="width: 80px;"></td>
        <td>: {{date('d-m-Y', strtotime($request->start_date)) . ' s/d ' . date('d-m-Y', strtotime($request->end_date))}}</td>
      </tr>
      @endisset
    </tbody>
  </table>
  <br>
  <table id="table_preview_main" class="table table-sm table_preview">
    <thead>
      <tr>
          <th>No.</th>
          <th>ID Pelanggan</th>
          <th>No. Identitas</th>
        <th>Nama Pelanggan</th>
        <th>Tipe</th>
        <th>Email</th>
        <th>No. Handphone</th>
        <th>Nama Produk</th>
        <th>Status</th>
        <th>Berlangganan pada</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($TableLaporan['table'] as $rec)
      <tr>
        <td class="text-center">{{$loop->iteration}}</td>
        <td class="text-center">{{$rec->cust_id}}</td>
        <td class="text-center">{{($rec->cust_identity_no)}}</td>
        <td class="text-center">{{$rec->cust_name}}</td>
        <td class="text-center">{{($rec->type_name)}}</td>
        <td class="text-center">{{($rec->email)}}</td>
        <td class="text-center">{{($rec->no_hp)}}</td>
        <td class="text-center">{{($rec->prod_desc)}}</td>
        <td class="text-center">{{($rec->status_name)}}</td>
        <td class="text-center">{{date('d-M-Y', strtotime($rec->subs_date))}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
{{-- 
    </tbody>
  </table> --}}

</div>
@endsection