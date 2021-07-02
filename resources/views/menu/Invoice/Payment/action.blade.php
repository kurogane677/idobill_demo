<form method="GET" enctype="multipart/form-data" action="{{route('print.invoice', $inv_no)}}" class="printForm text-center">
  <button type="submit" class="btn btn-sm btn-warning p-0 px-2">
    Print
  </button>
</form>

<script>
  $(function(){
    $('.printForm').submit(function(e){
      popupCenter({url: $(this).attr('action'), title: 'kwitansi', w: 1150, h: 630});
      e.preventDefault()
    });
});

</script>