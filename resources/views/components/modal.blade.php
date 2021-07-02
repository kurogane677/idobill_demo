<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable {{$modalSize}}" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title PoppinsFont">{{$title}}</h5>
      </div>
      <div class="modal-body">
        <form>
          {{$slot}}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        {{$savebutton}}
      </div>
    </div>
  </div>
</div>