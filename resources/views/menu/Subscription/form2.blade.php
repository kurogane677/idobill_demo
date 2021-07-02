<div class="container d-flex justify-content-center">

  <div class="col-6">
    <div class="card rounded-10 shadow mt-3" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
      <div class="card-body rounded-10 p-5">
        @if (Request::is('*/create'))
        <h5 class="text-dark">Berlangganan Baru</h5>
        @endif
        <div class="row no-gutters m-0 p-0 d-flex align-items-center">
          <div class="col-6">
            <small class="text-muted">Detail Pelanggan</small>
          </div>
          @if (Request::is('*/create'))
          <div class="col-6 text-right">
            <button type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsPelanggan">
              <svg class="bi" width="16" height="16" fill="currentColor">
                <use href="{{asset("bootstrap-icons.svg#person-lines-fill")}}" />
              </svg> &nbsp; Pilih Pelanggan
            </button>
          </div>
          @endif
        </div>

        <hr class="w-100">
        <x-inputreadonly ipname="cust_id" title="ID" value="{{$customer->cust_id ?? old('cust_id')}}" />
        <x-inputreadonly ipname="cust_name" title="Nama" value="{{$customer->cust_name ?? old('cust_name')}}" />
        <x-inputreadonly ipname="email" title="Email" value="{{$email ?? old('email')}}" />
        <x-inputreadonly ipname="cust_type" title="Jenis" value="{{$customer->type_name ?? old('cust_type')}}" />
        <x-inputreadonly ipname="area" title="Area" value="{{$area->area_name ?? old('area')}}" />
        <input id="area_id" value="{{$area->area_id ?? old('area_id')}}" hidden>
        <br>

        <div class="row no-gutters m-0 p-0 d-flex align-items-center">
          <div class="col-6">
            <small class="text-muted">LO</small>
          </div>
          @if (!Request::is('*/updown'))
          <div class="col-6 text-right">
            <button id="delete_lo" type="button" class="btn btn-danger btn-sm">
              <svg class="bi" width="16" height="16" fill="currentColor">
                <use href="{{asset("bootstrap-icons.svg#trash")}}" />
              </svg>
            </button>
            <button id="lo-btn" type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsLO">
              <svg class="bi" width="16" height="16" fill="currentColor">
                <use href="{{asset("bootstrap-icons.svg#shop")}}" />
              </svg> &nbsp; Pilih LO
            </button>
          </div>
          @endif
        </div>
        <hr class="w-100">
        <x-inputreadonly ipname="lo_group_id" title="ID LO" value="{{$subscription->lo_group_id ?? old('lo_group_id')}}" />
        <x-inputreadonly ipname="lo_group_name" title="Nama LO" value="{{$lo_group_name ?? old('lo_group_name')}}" />
        <br>

        <script>
          $(function(){
              $("#delete_lo").on('click', function(){
                $("#lo_group_id").val('');
                $("#lo_group_name").val('');
              });
            })
        </script>

        <div class="row no-gutters m-0 p-0 d-flex align-items-center">
          <div class="col-6">
            <small class="text-muted">Partner</small>
          </div>
          @if (!Request::is('*/updown'))
          <div class="col-6 text-right">
            <button id="delete_partner" type="button" class="btn btn-danger btn-sm">
              <svg class="bi" width="16" height="16" fill="currentColor">
                <use href="{{asset("bootstrap-icons.svg#trash")}}" />
              </svg>
            </button>
            <button id="partner-btn" type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsPartner">
              <svg class="bi" width="16" height="16" fill="currentColor">
                <use href="{{asset("bootstrap-icons.svg#exclude")}}" />
              </svg> &nbsp; Pilih Partner
            </button>
          </div>
          @endif
        </div>
        <hr class="w-100">
        <x-inputreadonly ipname="partner_group_id" title="ID Partner" value="{{$subscription->partner_group_id ?? old('lo_group_id')}}" />
        <x-inputreadonly ipname="partner_group_name" title="Nama Partner" value="{{$partner_group_name ?? old('partner_group_name')}}" />
        <br>

        <script>
          $(function(){
              $("#delete_partner").on('click', function(){
                $("#partner_group_id").val('');
                $("#partner_group_name").val('');
              });
            })
        </script>

      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="card rounded-10 shadow mt-3" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
      <div class="card-body rounded-10 p-5">
        <input type="text" name="old_subs_id" value="{{$id ?? ''}}" hidden>

        <div class="row no-gutters m-0 p-0 d-flex align-items-center">
          <x-inputprepend title="Tanggal Pembayaran" type="date" id="subs_date" name="subs_date" value="{{$subscription->subs_date ?? now()}}" opsi="required" />
        </div>

        <!-- Status -->
        <div class="input-group input-group-sm mb-2">
          <div class="input-group-prepend field170px">
            <span class="input-group-text field170px">Status</span>
          </div>
          <select class="form-control form-control-sm" id="subs_status" name="subs_status">
            <option value="2">UPGRADE</option>
            <option value="3">DOWNGRADE</option>
          </select>
        </div>

        <br>

        <div class="row no-gutters m-0 p-0 d-flex align-items-center">
          <div class="col-6">
            <small class="text-muted">Produk</small>
          </div>
          <div class="col-6 text-right">
            <button id="produk-btn" type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsProduk">
              <svg class="bi" width="16" height="16" fill="currentColor">
                <use href="{{asset("bootstrap-icons.svg#cart2")}}" />
              </svg> &nbsp; Pilih Produk
            </button>
          </div>
        </div>
        <hr class="w-100">
        <div class="col-12 p-0">
          <table id="{{ 'DataTableberlanggananProduk' }}" class="table table-sm table-bordered table-hover" style="width: 100%; font-size: 0.85rem;">
            <thead>
              <tr>
                <th>ID</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if (!Request::is('*/create'))
              @foreach ($products as $product)
              <tr>
                <td>
                  <input value="{{$product->prod_id}}" name="prod_id[]" class="biaya-rows" readonly>
                </td>
                <td>{{$product->prod_desc}}</td>
                <td>{{$product->prod_price}}</td>
                <td>
                  <div class="text-center">
                    <img id="del-icon" src='{{asset('images/delete.png')}}'>
                  </div>
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
            <tfoot>
              <tr>
                <th colspan="3" class="text-right">Total Produk :</th>
                <th colspan="1"></th>
              </tr>
            </tfoot>
          </table>
          <input id="totalProduk" name="prod_total" hidden>
        </div>

        <br>

        <div class="row no-gutters m-0 p-0 d-flex align-items-center">
          <div class="col-6">
            <small class="text-muted">Biaya Registrasi</small>
          </div>
          <div class="col-6 text-right">
            <button id="biaya-btn" type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsBiaya">
              <svg class="bi" width="16" height="16" fill="currentColor">
                <use href="{{asset("bootstrap-icons.svg#box")}}" />
              </svg> &nbsp; Pilih Biaya
            </button>
          </div>
        </div>
        <hr class="w-100">
        <div class="col-12 p-0">
          <table id="{{ 'DataTableberlanggananBiaya' }}" class="table table-sm table-bordered table-hover" style="width: 100%; font-size: 0.85rem;">
            <thead>
              <tr>
                <th>ID</th>
                <th>Biaya</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if (!Request::is('*/create'))
              @foreach ($biaya_all as $biaya)
              <tr>
                <td>
                  <input value="{{$biaya->biaya_id}}" name="biaya_id[]" class="biaya-rows" readonly>
                </td>
                <td>{{$biaya->biaya_name}}</td>
                <td>{{$biaya->biaya_price}}</td>
                <td>
                  <div class="text-center">
                    <img id="del-icon" src='{{asset('images/delete.png')}}'>
                  </div>
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
            <tfoot>
              <tr>
                <th colspan="3" class="text-right">Total Biaya :</th>
                <th colspan="1"></th>
              </tr>
            </tfoot>
          </table>
          <input id="totalBiaya" name="biaya_total" hidden>
        </div>

        <br>

        <div class="row no-gutters m-0 p-0 d-flex align-items-center">
          <div class="col-6">
            <h5 class="text-primary">Total Keseluruhan</h5>
          </div>
          <div class="col-6 text-right">
            <input type="text" class="form-control form-control-sm input_readonly text-right font-weight-bold" style="font-size: 1.1rem;" id="total" name="subs_total" value="0.00" readonly>
          </div>
        </div>

        <br>

        <div class="row">

          <div class="col-12">
            <div class="form-group">
              <label for="subs_remark">Keterangan</label>
              <textarea class="form-control" id="subs_remark" name="subs_remark" rows="3">{{$subscription->subs_remark ?? old('subs_remark')}}</textarea>
            </div>
          </div>

          {{-- <div class="col-5">
              <div class="form-group">
                <label for="bayar_penuh">Bayar Penuh ?</label>
                <select id="bayar_penuh" name="bayar_penuh" class="form-control form-control-sm">
                  <option value="1">Ya</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div> --}}

        </div>

        <div class="row">
          <div class="col-12 d-flex justify-content-end align-items-center">
            <a href="{{route('subscription.index')}}" class="btn btn-dark btn-sm mr-2">Kembali</a>
            <button id="submit-btn" type="submit" class="btn btn-success btn-sm">Simpan</button>
          </div>

          <script>
            $(function(){
                $("#submit-btn").on('click',function(e){                
                  let date = new Date($('#subs_date').val());
                  let subs_date = date.getDate();                  
                  let produk = $("#DataTableberlanggananProduk tbody tr td:first-child").text();
                  if ($("#cust_id").val()=='' || produk.includes('No data available in table' || subs_date == NaN))
                  {
                    e.preventDefault();
                    alert('Data pelanggan, tanggal berlangganan dan produk tidak boleh kosong!');
                  } 
                });
              });
          </script>
        </div>
      </div>
    </div>
  </div>
</div>

@if (!Request::is('*/updown'))
<!-- Modals:Pelanggan -->
<x-modals-with-table id="ModalsPelanggan" title="Pilih Pelanggan">
  {!! $cusTable->html()->table(['id' => 'subscriptioncustomer-table','class' => 'table table-striped']) !!}
</x-modals-with-table>

<!-- Modals:LO -->
<x-modals-with-table id="ModalsLO" title="Pilih LO" modalSize="modal-lg">
  {!! $loTable->html()->table(['id' => 'subscriptionlo-table','class' => 'table table-striped']) !!}
</x-modals-with-table>

<!-- Modals:Partner -->
<x-modals-with-table id="ModalsPartner" title="Pilih Partner" modalSize="modal-lg">
  {!! $partnerTable->html()->table(['id' => 'subscriptionpartner-table','class' => 'table table-striped']) !!}
</x-modals-with-table>
@endif

<!-- Modals:Produk -->
<x-modals-with-table id="ModalsProduk" title="Pilih Produk" modalSize="modal-xl">
  {!! $produkTable->html()->table(['id' => 'subscriptionproduk-table','class' => 'table table-striped']) !!}
</x-modals-with-table>

<!-- Modals:Biaya -->
<x-modals-with-table id="ModalsBiaya" title="Pilih Biaya" modalSize="modal-lg">
  {!! $biayaTable->html()->table(['id' => 'subscriptionbiaya-table','class' => 'table table-striped']) !!}
</x-modals-with-table>

@if (!Request::is('*/updown'))
{{ $cusTable->html()->scripts() }}
{{ $loTable->html()->scripts() }}
{{ $partnerTable->html()->scripts() }}
@endif
{{ $biayaTable->html()->scripts() }}
{{ $produkTable->html()->scripts() }}

<script>
  $(function() {
    $("#subscriptioncustomer-table").children('tbody').on('click', function(e){
      let td = $(e.target).closest('tr').children('td');
      let cust_id = td.eq(0).text();
      let cust_name = td.eq(1).text();
      let email = td.eq(2).text();
      let cust_type = td.eq(3).text();
      let area_id = td.eq(4).text();
      let area_name = td.eq(5).text();

      if (cust_id.includes('No data available'))
      {
        cust_id = '';
        cust_type = '';
        cust_name = '';
        email = '';
        area_name = '';
        $("#area_id").val('');
      }

      $("#cust_id").val(cust_id);
      $("#cust_type").val(cust_type);
      $("#cust_name").val(cust_name);
      $("#email").val(email);
      $("#area").val(area_name);

      // area_id = area_name.split(" ")[0]
      $("#area_id").val(area_id);

      $("#lo_group_id").val('');
      $("#lo_group_name").val('');
      $("#partner_group_id").val('');
      $("#partner_group_name").val('');

      $("#ModalsPelanggan").modal('toggle');

    });


    $("#subscriptionlo-table").children('tbody').on('click', function(e){
      let td = $(e.target).closest('tr').children('td');
      let lo_group_id = td.eq(0).text();
      let lo_group_name = td.eq(1).text();     

      if (lo_group_id.includes('No data available'))
      {
        lo_group_id = '';
        lo_group_name = '';
      }

      $("#lo_group_id").val(lo_group_id);
      $("#lo_group_name").val(lo_group_name);
      $("#ModalsLO").modal('toggle');
    });

    $("#subscriptionpartner-table").children('tbody').on('click', function(e){
      let td = $(e.target).closest('tr').children('td');
      let partner_group_id = td.eq(0).text();
      let partner_group_name = td.eq(1).text();

      if (partner_group_id.includes('No data available'))
      {
        partner_group_id = '';
        partner_group_id = '';
      }

      $("#partner_group_id").val(partner_group_id);
      $("#partner_group_name").val(partner_group_name);
      $("#ModalsPartner").modal('toggle');
    });
    
    $("#lo-btn, #partner-btn").on('click', function(){
      if ($("#cust_id").val()=='')
      {
        alert('Silahkan pilih pelanggan terlebih dahulu');
        return false;
      }
      refreshTable('#subscriptionlo-table');
      refreshTable('#subscriptionpartner-table');
    });

    $("#biaya-btn, #produk-btn").on('click', function(){
      if ($("#cust_id").val()=='')
      {
        alert('Silahkan pilih pelanggan terlebih dahulu');
        return false;
      }
    });

  });

  function refreshTable(tableID) {
    let area_title = 'Area : ' + $("#area").val().toString();
    $(".area-title").text(area_title);
    const table = $(tableID)    
    table.on('preXhr.dt', function(e, settings, data){
      data.area_id =  $("#area_id").val();
    });
    table.DataTable().ajax.reload();
  }

</script>

<script src="{{ asset('js/views/berlangganan/biaya.js') }}"></script>
<script src="{{ asset('js/views/berlangganan/produk.js') }}"></script>