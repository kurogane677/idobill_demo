@extends('menu.base_layout_menu')

@section('menu-header')
<h5 class="pt-2">iDoBill Users</h5>
@endsection


@section('filter-button')
{{-- <x-showfilterboxbtn /> --}}
@endsection

@section('filter-menu')
<form class="col-12 bg-blue text-white py-4 form-filter form-filter-hide">
  @csrf

  <div class="form-row d-flex justify-content-center">
    <div class="col-3">
      <span>Group Akses</span>
    </div>
  </div>

  <div class="form-row d-flex justify-content-center">
    <div class="col-3">
      <select name="a" id="a" class="form-control form-control-sm">
        <option value="all"> - Pilih Area - </option>
        <option value="1">Equal</option>
        <option value="2">Less Than</option>
        <option value="3">Greater Than</option>
      </select>
    </div>
  </div>

  <div class="form-row mt-2 d-flex justify-content-center">
    <div class="col-3 d-flex justify-content-center">
      <x-resetfilterbtn> Reset</x-resetfilterbtn>
      <div class="ml-2"></div>
      <x-submitfilterbtn> Submit Filter</x-submitfilterbtn>
    </div>
  </div>

</form>
@endsection

@section('menu-body')

<div class="col-12 pt-4 pb-2">
  <form>
    {!! $dataTable->table() !!}
  </form>
</div>
@endsection

@section('menu-footer')
<div class="card-footer d-flex justify-content-end align-items-center">
  <a href="{{url('password/reset')}}" class="btn btn-sm btn-danger">Reset User Password</a>


  @if ($user_type == "LO")
  <a href="{{route('lo_user.create', $GroupID)}}" class="btn btn-sm btn-success text-white ml-2">+ Tambah User Baru</a>
  @else
  <button class="btn btn-sm btn-success ml-3" data-toggle="modal" data-target="#userBaruModal">+ Tambah User Baru</button>
  @endif

</div>
@endsection

@section('modals')
<!-- Modal -->
<div class="modal fade" id="userBaruModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Tipe User Baru</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">

        <a href="customer/create" class="btn btn-sm abtn-a">
          <div class="slop">
            <img src="{{ asset('images/new_customer_user.jpg') }}" alt="">
          </div>
          Customer
        </a>

        @if (!in_array($user_type, array("LO","PTN")))
        <a href="{{route('user_management.create', 'GTI')}}" class="btn btn-sm abtn-a">
          <div class="slop">
            <img src="{{ asset('images/new_gti_user.jpg') }}" alt="">
          </div>
          GTI
        </a>
        @endif

        @if ($user_type != "PTN")
        <a href="{{route('user_management.create', 'LO')}}" class="btn btn-sm abtn-a">
          <div class="slop">
            <img src="{{ asset('images/new_lo_user.jpg') }}" alt="">
          </div>
          LO
        </a>
        @endif

        @if ($user_type != "LO")
        <a href="{{route('user_management.create', 'PTN')}}" class="btn btn-sm abtn-a">
          <div class="slop">
            <img src="{{ asset('images/new_partner_user.jpg') }}" alt="">
          </div>
          Partner
        </a>
        @endif

        @if ($profiles->type == 'SU')
        <a href="{{route('user_management.create', 'SU')}}" class="btn btn-sm abtn-a">
          <div class="slop">
            <img src="{{ asset('images/new_super_user.png') }}" alt="">
          </div>
          Super User
        </a>
        @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modals:image -->
<div class="modal fade" id="ImgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
    <img loading="lazy" width="80%" src="{{$noImg}}" id="previewImgModal" onerror="this.onerror=null; this.src='{{$noImg}}'">
  </div>
</div>

<!-- Modals:email -->
<x-modals-send-email id="ModalsLoading" email="" />

@endsection

@section('scripts')
{!! $dataTable->scripts() !!}

<script>
  function sendEmail($email) {
    if (confirm('Email invitation akan dikirim ke user ini')){
        $(".email").text($email);
        $("#ModalsLoading").modal("toggle");
        return true;
      }else{
        return false;
      }
    }
</script>

<script>
  function format (d) {
    // `d` is the original data object for the row
      return `<table width="100%" class="table-child-detail">
        <tr>
            <td>Created</td>
            <td>:</td>
            <td>${new Date(d.created_at)}, By: ${d.created_by}</td>
        </tr>
        <tr>
            <td>Last Updated</td>
            <td>:</td>
            <td>${d.updated_at ? new Date(d.updated_at)+', By: '+d.updated_by : ''}</td>
        </tr>
      </table>`;
    }
  
    $(function() {
    var tblID = "#usermanagement-table"
    var table = $("#usermanagement-table").DataTable();
    
    $(tblID + " tbody").on("click", "td.details-control", function () {
      var tr = $(this).closest("tr");
      var row = table.row( tr );
      if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass("shown");
      }
      else {
          // Open this row
          row.child( format(row.data())).show();
          tr.addClass("shown");
          // console.log(row.data());
      }
    });

    $(tblID).on("click", ".imgZoom", function() {
      {
        var data = table.row( this ).data()["profile_img"]
        var filename = $(data).attr("src");

        $("#ImgModal").modal("show");
        $("#previewImgModal").attr("src", filename);
      }
    });
  });
</script>
@endsection