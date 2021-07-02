<form target="_blank" method="GET" enctype="multipart/form-data" action="{{route('subscription.printPDF')}}">
  @csrf
  <div class="modal fade" id="ModalsKwitansi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header pt-2 pb-1 bg-primary text-white d-flex justify-content-center align-items-center">
          <h5>
            <input name="title" value="Form Kwitansi" class="title input-pdf text-center text-white" readonly />
          </h5>
        </div>
        <div class="modal-body mt-0 pt-0">
          <div class="form-wrapper">
            <div class="my-2"></div>
            @include('menu.Subscription.PDF.kwitansi_baru')
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <span>Mohon di cek form kwitansi dengan teliti</span>
          <div class="buttons">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
              Close
            </button>
            <button type="submit" class="printBtn btn btn-danger btn-sm ml-1">
              Print Kwitansi
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</form>