<div class="flex-start">

  <form method="GET" enctype="multipart/form-data" action="{{route('print.kredit', $id)}}" class="printForm">
    <button type="submit" class="btn btn-sm btn-warning p-0 px-2">
      Print
    </button>
  </form>

  <a href="{{route('kredit.edit', $id)}}" class="btn btn-sm btn-success p-0 px-2 ml-1">
    Edit
  </a>

</div>

<script>
  $(function(){
    $('.printForm').submit(function(e){
      popupCenter({url: $(this).attr('action'), title: 'Kredit', w: 1150, h: 630});
      e.preventDefault()
    });
  });
</script>