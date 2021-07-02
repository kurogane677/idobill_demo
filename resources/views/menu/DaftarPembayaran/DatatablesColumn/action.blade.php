<div class="flex-center">

  {{-- <form class="printForm mr-1" action="{{ route("print.kwitansi", $id) }}" method="POST"> --}}
  <form method="GET" enctype="multipart/form-data" action="{{route('print.kwitansi', $inv_no)}}" class="printForm mr-1">
    @csrf

    <button type="submit" class="btn btn-sm btn-warning p-0 px-2">
      Print
    </button>

  </form>

  @if ($user_type!='CUS')
  <form action="{{ route("daftar_pembayaran.destroy", $id) }}" method="POST">
    @csrf
    @method("delete")

    <a href="{{route("daftar_pembayaran.edit", $id)}}" class="btn btn-sm btn-success p-0 px-2">
      Edit
    </a>

    <button type="submit" onclick="return confirm('Anda Yakin Nomor Pembayaran Ini Akan Dihapus?')" class="btn btn-sm btn-danger p-0 px-2">
      Void
    </button>
  </form>
  @endif

</div>

<script>
  $(function(){
    $('.printForm').on('click', function(e){
      popupCenter({url: $(this).attr('action'), title: 'kwitansi', w: 1150, h: 630});
      e.preventDefault()
    });
});
</script>