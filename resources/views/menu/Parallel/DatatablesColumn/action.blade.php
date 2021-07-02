<form class="d-flex justify-content-center">
  @csrf

  <button type="button" class="btn btn-sm btn-outline-purple border-0 ml-3 shadow" data-toggle="modal" data-target="#DetailParallel">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
      <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
    </svg>
  </button>

  <a href="{{ route("parallel.destroy", $kode) }}" class="btn btn-sm btn-outline-danger border-0 shadow ml-2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-delay='{"hide":"100"}' title="Delete Parallel">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
    </svg>
  </a>

</form>

</div>

<!-- Modal:Detail Data Parallel -->
<div class="modal fade" id="DetailParallel" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title PoppinsFont">Detail Data Parallel</h5>
      </div>
      <div class="modal-body">

        <!-- Kode -->
        <div class="input-group input-group-sm mb-2">
          <div class="input-group-prepend">
            <span class="input-group-text">Kode</span>
          </div>
          <input type="text" class="form-control form-control-sm" value="{{ $kode }}" readonly>
        </div>

        <!-- Tgl Parallel -->
        <div class="input-group input-group-sm mb-2">
          <div class="input-group-prepend">
            <span class="input-group-text">Tgl Parallel</span>
          </div>
          <input type="text" class="form-control form-control-sm" value="{{ $tgl }}" readonly>
        </div>
        {{-- 
      <!-- ID Customer -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">ID Customer</span>
        </div>
        <input type="text" class="form-control form-control-sm" value="{{ $id_cust }}" readonly>
      </div>

      <!-- Nama Customer -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Nama Customer</span>
        </div>
        <input type="text" class="form-control form-control-sm" value="{{ $nama_cust }}" readonly>
      </div>

      <!-- Iuran -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Iuran</span>
        </div>
        <input type="text" class="form-control form-control-sm" value="{{ $total_bayar }}" readonly>
      </div>

      <!-- Bulan -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Bulan</span>
        </div>
        <input type="text" class="form-control form-control-sm" value="{{ $bulan }}" readonly>
      </div>

      <!-- Total Terima -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Total Terima</span>
        </div>
        <input type="text" class="form-control form-control-sm" value="{{ $total_terima }}" readonly>
      </div>

      <!-- Dibayar Oleh -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Dibayar Oleh</span>
        </div>
        <input type="text" class="form-control form-control-sm" value="{{ $dibayar_oleh }}" readonly>
      </div>

      <!-- Produk -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Produk</span>
        </div>
        <input type="text" class="form-control form-control-sm" value="{{ $nama_product }}" readonly>
      </div> --}}

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>