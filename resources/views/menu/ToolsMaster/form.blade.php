<div class="row mt-4 d-flex justify-content-center">
  <div class="col-6">


    <!-- Category -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Category *</span>
      </div>
      <select class="form-control form-control-sm" id="prod_category" name="prod_category">
        @foreach ($categories as $category_id => $category_name)
        @if (Request::is('*/edit'))
        <option value="{{$category_id}}" {{($category_id == $product->prod_category) ? 'selected' : '' }}>
          {{$category_name}}
        </option>
        @else
        <option value="{{$category_id}}">
          {{$category_name}}
        </option>
        @endif
        @endforeach
      </select>
    </div>

    <!-- Status -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Status *</span>
      </div>
      <select class="form-control form-control-sm" id="prod_status" name="prod_status">
        @foreach ($prod_status as $status_id => $status_name)
        @if (Request::is('*/edit'))
        <option value="{{$status_id}}" {{($status_id == $product->prod_status) ? 'selected' : '' }}>
          {{$status_name}}
        </option>
        @else
        <option value="{{$status_id}}">
          {{$status_name}}
        </option>
        @endif
        @endforeach
      </select>
    </div>

    <!-- Nama Produk -->
    @if (Request::is('*/edit'))
    <x-form-input title="Nama {{$module->section}} *" ipname="prod_desc" value="{{$product->prod_desc}}" opsi="required autofocus" />
    @else
    <x-form-input title="Nama {{$module->section}} *" ipname="prod_desc" value="{{old('prod_desc')}}" opsi="required autofocus" />
    @endif

    <!-- Harga -->
    @if (Request::is('*/edit'))
    <x-form-input type="number" title="Harga *" ipname="prod_price" value="{{$product->prod_price}}" opsi="required" />
    @else
    <x-form-input type="number" title="Harga *" ipname="prod_price" value="{{old('prod_price')}}" opsi="required" />
    @endif

    <!-- UOM -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">UOM *</span>
      </div>
      <select class="form-control form-control-sm" id="prod_uom" name="prod_uom">
        @foreach ($prod_uom as $uom_id => $uom_name)
        @if (Request::is('*/edit'))
        <option value="{{$uom_id}}" {{($uom_id == $product->prod_uom) ? 'selected' : '' }}>
          {{$uom_name}}
        </option>
        @else
        <option value="{{$uom_id}}">
          {{$uom_name}}
        </option>
        @endif
        @endforeach
      </select>
    </div>

    <!-- Keterangan -->
    @if (Request::is('*/edit'))
    <x-alamat-input title="Keterangan" ipname="prod_remark" value="{{$product->prod_remark}}" />
    @else
    <x-alamat-input title="Keterangan" ipname="prod_remark" value="{{old('prod_remark')}}" />
    @endif

    @if (Request::is('*edit*'))
    @if ($updated_by != '')
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ Carbon\Carbon::parse($product->updated_at)->format('d M Y H:i:s') }}
          oleh
          {{$updated_by}}
        </cite>
      </small>
    </footer>
    @endif
    @endif

  </div>
</div>