<div class="flex-start">

  @if ($cust_type == 0)
  <form method="GET" enctype="multipart/form-data" action="{{route('print.kwitansi', $inv_no)}}" class="printForm">
    <button type="submit" class="btn btn-sm btn-warning p-0 px-2">
      Print
    </button>
  </form>
  @else
  <form method="GET" enctype="multipart/form-data" action="{{route('print.invoice', $inv_no)}}" class="printForm">
    <button type="submit" class="btn btn-sm btn-warning p-0 px-2">
      Print
    </button>
  </form>
  @endif

  @if ($inv_status == 0 && $user_type!='CUS')
  <a href="{{route('invoice.payment', $inv_no)}}" class="btn btn-sm btn-success p-0 px-2 ml-1">
    Bayar
  </a>
  @endif
</div>
<script>
  $(function(){
    $('.printForm').submit(function(e){
      popupCenter({url: $(this).attr('action'), title: 'invoice', w: 1150, h: 630});
      e.preventDefault()
    });
});
</script>