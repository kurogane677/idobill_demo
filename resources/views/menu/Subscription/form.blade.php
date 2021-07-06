<div class="container-fluid flex-center">
  <div class="col-12">
    <div class="row">
      <div class="col-6">
        <div class="card rounded-10 shadow mt-3" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
          <div class="card-body rounded-10 p-5">
            <div class="row">
              @if (Request::is('*create*'))
              <h5 class="text-dark">Berlangganan Baru</h5>
              @endif
              <div class="col-12">
                <div class="row no-gutters m-0 p-0 d-flex align-items-center">
                  <div class="col-6">
                    <small class="text-muted">Detail Pelanggan</small>
                  </div>
                  @if (Request::is('*create*'))
                  <div class="col-6 text-right">
                    <button type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsPelanggan">
                      <svg class="bi" width="16" height="16" fill="currentColor">
                        <use href="{{asset("bootstrap-icons.svg#person-lines-fill")}}" />
                      </svg> &nbsp; Pilih Pelanggan
                    </button>
                  </div>
                  @endif
                </div>
              </div>
              <hr class="w-100">
              <x-inputreadonly class="w120px" ipname="cust_id" title="ID" value="{{$customer->cust_id ?? old('cust_id')}}" />
              <x-inputreadonly class="w120px" ipname="cust_name" title="Nama" value="{{$customer->cust_name ?? old('cust_name')}}" />
              <x-inputreadonly class="w120px" ipname="email" title="Email" value="{{$email ?? old('email')}}" />
              <x-inputreadonly class="w120px" ipname="cust_type" title="Jenis" value="{{$customer->type_name ?? old('cust_type')}}" />
              <x-inputreadonly class="w120px" ipname="area" title="Area" value="{{$area->area_name ?? old('area')}}" />
              <input id="area_id" value="{{$area->area_id ?? old('area_id')}}" hidden>
            </div>

            <!-- LO -->
            <div class="row mt-3">
              <div class="col-2 d-flex align-items-end">
                <small class="text-muted">LO</small>
              </div>
              @if (!Request::is('*/updown'))
              @if ($user_type != "LO")
              <div class="col-10 text-right">
                <button id="delete_lo" type="button" class="btn btn-danger btn-sm">
                  <svg class="bi" width="16" height="16" fill="currentColor">
                    <use href="{{asset("bootstrap-icons.svg#eraser-fill")}}" />
                  </svg>
                </button>
                <button id="lo-btn" type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsLO">
                  <svg class="bi" width="16" height="16" fill="currentColor">
                    <use href="{{asset("bootstrap-icons.svg#shop")}}" />
                  </svg> &nbsp; Pilih LO
                </button>
              </div>
              @endif
              @endif

              <hr class="w-100">
              @if (Request::is('*create*'))
              <x-inputreadonly class="w120px" ipname="lo_group_id" title="ID LO" value="{{$GroupID}}" />
              <x-inputreadonly class="w120px" ipname="lo_group_name" title="Nama LO" value="{{$GroupName}}" />
              @else
              <x-inputreadonly class="w120px" ipname="lo_group_id" title="ID LO" value="{{$subscription->lo_group_id}}" />
              <x-inputreadonly class="w120px" ipname="lo_group_name" title="Nama LO" value="{{$lo_group_name}}" />
              @endif

              <script>
                $(function(){
                  $("#delete_lo").on('click', function(){
                    $("#lo_group_id").val('');
                    $("#lo_group_name").val('');
                  });
                })
              </script>
            </div>

            <!-- PARTNER -->
            <div class="row mt-3">
              <div class="col-2 d-flex align-items-end">
                <small class="text-muted">Partner</small>
              </div>
              @if (!Request::is('*/updown'))
              <div class="col-10 text-right">
                <button id="delete_partner" type="button" class="btn btn-danger btn-sm">
                  <svg class="bi" width="16" height="16" fill="currentColor">
                    <use href="{{asset("bootstrap-icons.svg#eraser-fill")}}" />
                  </svg>
                </button>
                <button id="partner-btn" type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsPartner">
                  <svg class="bi" width="16" height="16" fill="currentColor">
                    <use href="{{asset("bootstrap-icons.svg#exclude")}}" />
                  </svg> &nbsp; Pilih Partner
                </button>
              </div>
              @endif

              <hr class="w-100">
              <x-inputreadonly class="w120px" ipname="partner_group_id" title="ID Partner" value="{{$subscription->partner_group_id ?? old('lo_group_id')}}" />
              <x-inputreadonly class="w120px" ipname="partner_group_name" title="Nama Partner" value="{{$partner_group_name ?? old('partner_group_name')}}" />
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
      </div>

      <div class="col-6">
        <div class="card rounded-10 shadow mt-3" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
          <div class="card-body rounded-10 p-5">
            <input type="text" name="old_subs_id" value="{{$id ?? ''}}" hidden>
            <div class="row">
              <div class="col-12">
                @if (Request::is('*/updown'))
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
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <!-- Tanggal -->
                <div class="row no-gutters m-0 p-0 d-flex align-items-center">
                  @if (Request::is('*aktifkan*'))
                  <x-inputprepend title="Tgl Aktivasi Ulang" type="date" id="subs_date" name="subs_date" value="{{$subscription->subs_date ?? now()}}" opsi="required" />
                  @else
                  <x-inputprepend title="Tanggal Berlangganan" type="date" id="subs_date" name="subs_date" value="{{$subscription->subs_date ?? now()}}" opsi="required" />
                  @endif
                  <input type="date" value="" id="exp_date" name="exp_date" hidden>
                </div>
              </div>

            </div>

            <!-- PRODUK -->
            <div class="my-3"></div>
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
                  @if (!Request::is('*create*'))
                  @foreach ($products as $product)
                  <tr>
                    <td>{{$product->prod_id}}</td>
                    <td>{{$product->prod_desc}}</td>
                    <td>
                      <input type="number" value="{{$product->prod_price}}" name="prod_price[]" class="prod_price text-right w120px">
                    </td>
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
                    <th colspan="1" id="prod_total">0</th>
                  </tr>
                </tfoot>
              </table>
              <input id="prod_total_input" name="prod_total" hidden>
            </div>

            <br>

            <!-- BIAYA -->
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
                  @if (!Request::is('*create*'))
                  @foreach ($biaya_all as $biaya)
                  <tr>
                    <td>{{$biaya->biaya_id}}</td>
                    <td>{{$biaya->biaya_name}}</td>
                    <td>
                      <input type="number" value="{{$biaya->biaya_price}}" name="biaya_price[]" class="biaya_price text-right w120px">
                    </td>
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
                    <th colspan="1" id="biaya_total">0</th>
                  </tr>
                </tfoot>
              </table>
              <input id="biaya_total_input" name="biaya_total" hidden>
            </div>

            <br>

            <!-- Table:Perangkat Instalasi -->
            <div class="row">
              <div class="col-7 d-flex align-items-end">
                <small class="text-muted">Installasi Perangkat Untuk Konektivitas</small>
              </div>
              <div class="col-5 text-right">
                <button id="alat-btn" type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsPilihAlat">
                  <svg class="bi" width="16" height="16" fill="currentColor">
                    <use href="{{asset("bootstrap-icons.svg#hdd-fill")}}" />
                  </svg> &nbsp; Pilih Perangkat
                </button>
              </div>
            </div>
            <hr class="w-100">
            <div class="col-12 p-0">
              <table id="{{ 'DataTableberlanggananPerangkat' }}" class="table table-sm table-bordered table-hover" style="width: 100%; font-size: 0.85rem;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Details</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (!Request::is('*create*'))
                  @foreach ($tools as $tool)
                  <tr>
                    <td>{{$tool->tools_id}}</td>
                    <td>{!!$tool->details!!}</td>
                    <td>
                      <div class="text-center">
                        <img id="del-icon" src='{{asset('images/delete.png')}}'>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>

            <br>

            <!-- TOTAL -->
            <div class="row no-gutters m-0 p-0 d-flex align-items-center">
              <div class="col-6">
                <h5 class="text-primary">Total Keseluruhan</h5>
              </div>
              <div class="col-6 text-right">
                <input type="text" class="form-control form-control-sm input_readonly text-right font-weight-bold" style="font-size: 1.1rem;" id="subs_total" name="subs_total" value="0.00" readonly>
              </div>
            </div>

            <div class="row no-gutters m-0 p-0 d-flex align-items-center justify-content-end mt-2">
              <div class="col-12">
                <p>*Note: Untuk berlangganan baru, total produk dihitung prorate mulai dari tanggal berlangganan sampai akhir dari bulan berjalan.</p>
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

<!-- Modals:STB -->
<x-modals-with-table id="ModalsSTB" title="Pilih Set Top Box" modalSize="modal-xl">
  {!! $stbTable->html()->table(['id' => 'subscriptionstb-table','class' => 'table table-striped']) !!}
</x-modals-with-table>

<!-- Modals:Router -->
<x-modals-with-table id="ModalsRouter" title="Pilih Modem / Router" modalSize="modal-xl">
  {!! $routerTable->html()->table(['id' => 'subscriptionrouter-table','class' => 'table table-striped']) !!}
</x-modals-with-table>

<!-- Modals:AlatLain -->
{{-- <x-modals-with-table id="ModalsAlatLain" title="Pilih Alat/Perangkat Lain" modalSize="modal-xl">
  {!! $biayaTable->html()->table(['id' => 'subscriptionbiaya-table','class' => 'table table-striped']) !!}
</x-modals-with-table> --}}

<!-- Modals:Alat -->
<div class="modal fade" id="ModalsPilihAlat" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content modal-content-alat p-4">
      <h5 class="text-dark">Pilih Perangkat</h5>
      <div class="line"></div>
      <div class="d-flex flex-center mt-3">

        <button class="btn" type="button" data-toggle="modal" data-target="#ModalsSTB" onclick="$('#ModalsPilihAlat').modal('toggle')">
          <div class="slop">
            <img src="{{ asset('images/stb.png') }}" alt="">
          </div>
          Set Top Box
        </button>

        <button class="btn" type="button" data-toggle="modal" data-target="#ModalsRouter" onclick="$('#ModalsPilihAlat').modal('toggle')">
          <div class="slop">
            <img src="{{ asset('images/router.png') }}" alt="">
          </div>
          Modem / Router
        </button>

        {{-- <button class="btn" type="button" data-toggle="modal" data-target="#ModalsAlatLain" onclick="$('#ModalsPilihAlat').modal('toggle')">
          <div class="slop">
            <img src="{{ asset('images/alatlain.png') }}" alt="">
      </div>
      Alat Lainnya
      </button> --}}

    </div>
  </div>
</div>
</div>

@if (!Request::is('*/updown'))
{{ $cusTable->html()->scripts() }}
{{ $loTable->html()->scripts() }}
{{ $partnerTable->html()->scripts() }}
@endif
{{ $biayaTable->html()->scripts() }}
{{ $produkTable->html()->scripts() }}
{{ $stbTable->html()->scripts() }}
{{ $routerTable->html()->scripts() }}

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

      if (cust_id != '') {
        $("#cust_id").val(cust_id);
        $("#cust_type").val(cust_type);
        $("#cust_name").val(cust_name);
        $("#email").val(email);
        $("#area").val(area_name);
        $("#area_id").val(area_id);
        $("#ModalsPelanggan").modal('toggle');
      }
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
      if (lo_group_id != '') {
        $("#lo_group_id").val(lo_group_id);
        $("#lo_group_name").val(lo_group_name);
        $("#ModalsLO").modal('toggle');
      }
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
      if (partner_group_id != '') {
        $("#partner_group_id").val(partner_group_id);
        $("#partner_group_name").val(partner_group_name);
        $("#ModalsPartner").modal('toggle');
      }
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

    $("#biaya-btn, #produk-btn, #alat-btn").on('click', function(){
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
<script src="{{ asset('js/views/berlangganan/alat.js') }}"></script>
<script src="{{ asset('js/views/berlangganan/perangkat.js') }}"></script>

<script>
  function sum_() {
    let sum_b = 0;
    $('.biaya_price').each(function() {
        sum_b += Number($(this).val());
    });
    $("#biaya_total").text(number_format(sum_b,0,',','.'));
    $("#biaya_total_input").val(sum_b)

    let sum_p = 0;
    $('.prod_price').each(function() {
      sum_p += Number($(this).val());
    });
    $("#prod_total").text(number_format(sum_p,0,',','.'));
    $("#prod_total_input").val(sum_p)
          
    // jika berlangganan baru, dilakukan prorata
    let newSubs = "{{$newSubs}}";
    if (newSubs=="NEW")
    {
      let subs_date = $("#subs_date").val();
      let dt = new Date(subs_date);
      let month = dt.getMonth()+1;
      let year = dt.getFullYear();
      let endDate = new Date(year, month, 0);
      let totalDays = endDate.getDate();
      let oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
      let diffDays = Math.round(Math.abs((dt - endDate)/oneDay)+1);
      
      sum_p = Math.round((sum_p / totalDays) * diffDays);
      sum_p = Math.round(sum_p / 1000) * 1000;
    }

    let sumTotal = sum_b + sum_p;
    return $("#subs_total").val(number_format(sumTotal,0,',','.'));
  }

  function lastDate(){
      let subs_date = $("#subs_date").val();
      let dt = new Date(subs_date);
      let month = dt.getMonth()+1;
      let year = dt.getFullYear();
      let endDate = new Date(year, month, 0);
      return endDate;
  }

  $(function() {
    $("#exp_date").val(format_date(lastDate(), 'yyyy-mm-dd'));
    $("#subs_date").on('change', function(){
      $("#exp_date").val(format_date(lastDate(), 'yyyy-mm-dd'));
      sum_();
    });
  });
</script>