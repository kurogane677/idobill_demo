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

  <h5 class="text-center"><strong>LAPORAN PENJUALAN</strong></h5>

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
      <tr>
        <td>Produk</td>
        <td style="width: 80px;"></td>
        <td>: {{($request->produk=='all') ? 'Semua produk' : $request->produk}}</td>
      </tr>
      <tr>
        <td>Tipe Produk</td>
        <td style="width: 80px;"></td>
        <td>: {{($request->tipe_produk=='all') ? 'Semua tipe produk' : $request->tipe_produk}}</td>
      </tr>
      <tr>
        <td>Area</td>
        <td style="width: 80px;"></td>
        <td>: {{($request->area=='all') ? 'Semua area' : $request->area}}</td>
      </tr>
      <tr>
        <td>Status</td>
        <td style="width: 80px;"></td>
        <td>: {{($request->status=='all') ? 'Semua status' : $request->status}}</td>
      </tr>
      @endisset
    </tbody>
  </table>
  <br>
  <table id="table_preview_main" class="table table-sm table_preview">
    <thead>
      <tr>
        <th>No</th>
        <th>No Inv</th>
        <th>Tgl Inv</th>
        <th>ID Pelanggan</th>
        <th>Nama Pelanggan</th>
        <th>Sales</th>
        <th>Kredit Note</th>
        <th>NET Sales</th>
        <th>Pembayaran</th>
        <th>Debit Note</th>
        <th>Outstanding</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($TableLaporan['table'] as $item)
      <tr>
        <td class="text-center" style="width: 10px;">{{$loop->iteration}}</td>
        <td class="text-center" style="width: 80px;">{{$item->inv_no}}</td>
        <td class="text-center" style="width: 80px;">{{date('d-m-Y', strtotime($item->inv_date))}}</td>
        <td class="text-center" style="width: 80px;">{{$item->cust_id}}</td>
        <td>{{$item->cust_name}}</td>
        <td class="text-right" style="width: 80px;">{{number_format($item->grand_total,2)}}</td>
        <td class="text-right" style="width: 80px;">{{number_format($item->total_kredit,2)}}</td>
        <td class="text-right" style="width: 80px;">{{number_format($item->total_net,2)}}</td>
        <td class="text-right" style="width: 80px;">{{number_format($item->received_total,2)}}</td>
        <td class="text-right" style="width: 80px;">{{number_format($item->total_debit,2)}}</td>
        <td class="text-right" style="width: 80px;">{{number_format($item->outstanding,2)}}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td class="text-right" colspan=5>TOTAL</td>
        <td class="text-right">{{number_format($TableLaporan['sum_sales'],2)}}</td>
        <td class="text-right">{{number_format($TableLaporan['sum_kredit'],2)}}</td>
        <td class="text-right">{{number_format($TableLaporan['sum_net'],2)}}</td>
        <td class="text-right">{{number_format($TableLaporan['sum_bayar'],2)}}</td>
        <td class="text-right">{{number_format($TableLaporan['sum_debit'],2)}}</td>
        <td class="text-right">{{number_format($TableLaporan['sum_outstanding'],2)}}</td>
      </tr>
    </tfoot>
  </table>

  <!-- Table Terbilang -->
  <table class="table_preview table-borderless" style="font-size: 0.85rem;">
    <tbody>
      @isset($TableLaporan['terbilang_1'])
      <tr>
        <td>Terbilang Total Sales</td>
        <td style="width: 80px;"></td>
        <td class="font-italic">{{':' . $TableLaporan['terbilang_1'] ?? ''}}</td>
      </tr>
      @endisset

      @isset($TableLaporan['terbilang_2'])
      <tr>
        <td>Terbilang Total Kredit Note</td>
        <td style="width: 80px;"></td>
        <td class="font-italic">{{':' . $TableLaporan['terbilang_2'] ?? ''}}</td>
      </tr>
      @endisset

      @isset($TableLaporan['terbilang_3'])
      <tr>
        <td>Terbilang Total Net Sales</td>
        <td style="width: 80px;"></td>
        <td class="font-italic">{{':' . $TableLaporan['terbilang_3'] ?? ''}}</td>
      </tr>
      @endisset

      @isset($TableLaporan['terbilang_4'])
      <tr>
        <td>Terbilang Total Pembayaran</td>
        <td style="width: 80px;"></td>
        <td class="font-italic">{{':' . $TableLaporan['terbilang_4'] ?? ''}}</td>
      </tr>
      @endisset

      @isset($TableLaporan['terbilang_5'])
      <tr>
        <td>Terbilang Total Debit Note</td>
        <td style="width: 80px;"></td>
        <td class="font-italic">{{':' . $TableLaporan['terbilang_5'] ?? ''}}</td>
      </tr>
      @endisset

      @isset($TableLaporan['terbilang_6'])
      <tr>
        <td>Terbilang Total Outstanding</td>
        <td style="width: 80px;"></td>
        <td class="font-italic">{{':' . $TableLaporan['terbilang_6'] ?? ''}}</td>
      </tr>
      @endisset

    </tbody>
  </table>

</div>
@endsection