<div class="flex-start">

  <form method="GET" enctype="multipart/form-data" action="{{route('print.kredit', $id)}}" class="printForm">
    <button type="submit" class="btn btn-sm btn-warning p-0 px-2">
      Print
    </button>
  </form>

  @if ($status == 0)
  <a href="{{route('kredit.edit', $id)}}" class="btn btn-sm btn-success p-0 px-2 mx-1">
    Edit
  </a>

  <form action="{{route('kredit.destroy', $id)}}" method="POST">
    @csrf
    @method("delete")
    <button type="submit" onclick="return confirm('Anda Yakin Customer ini ingin dihapus?')" class="btn btn-sm btn-danger p-0 px-2">
      Delete
    </button>
  </form>
  @endif

</div>

<script>
  $(function(){
    $('.printForm').submit(function(e){
      popupCenter({url: $(this).attr('action'), title: 'Kredit', w: 1150, h: 630});
      e.preventDefault()
    });
  });
</script>