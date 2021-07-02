<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable {{$modalSize}} {{$modalPosition}}" role="document">
    <div class="modal-content">
      <div class="modal-body mt-0 pt-0">
        <div class="d-flex justify-content-between align-items-center mt-4 mr-3">
          <h6>{{$title}}</h6>
          <span class="area-title badge badge-info p-2"></span>
        </div>
        <hr class="w-100">
        {{$slot}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>