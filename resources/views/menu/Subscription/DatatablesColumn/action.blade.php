<!-- Hanya untuk status pasang baru, upgrade, dan downgrade baru -->
@if ($subs_status == 0 || $subs_status == 2 || $subs_status == 3)
<form action="{{ route('subscription.destroy', $id) }}" method="POST" class="text-left">
  @csrf
  @method("delete")
  <a href="{{route('subscription.edit', $id)}}" class="edit-subs btn btn-sm btn-info p-0 px-2">
    Edit
  </a>
  <button type="submit" onclick="return confirm('Anda yakin langganan ini akan dihapus?, tagihan yang belum dibayarkan untuk langganan ini juga akan dihapus!.\nJika ada langganan yang sebelumnya, langganan tersebut akan diubah statusnya kembali menjadi aktif berlangganan')" class="btn btn-sm btn-danger p-0 px-2">
    Delete
  </button>
</form>
@endif

<!-- Hanya untuk status aktif berjalan -->
@if ($subs_status == 1)
<form action="{{route('subscription.putusSementara', $id)}}" method="POST" class="text-left">
  @csrf
  <a href="{{route('subscription.updown', $id)}}" class="updown-subs btn btn-sm btn-success p-0 px-2">
    Up/Down
  </a>
  <button type="submit" onclick="return confirm('Anda yakin langganan ini akan diputus sementara?.\nSemua tagihan yang belum dibayar untuk langganan ini akan dihapus!')" class="btn btn-sm btn-dark p-0 px-2">
    Putus
  </button>
</form>
@endif

<!-- Hanya untuk status putus sementara -->
@if ($subs_status == 6)
<form action="{{route('subscription.putusPermanen', $id)}}" method="POST" class="text-left">
  @csrf
  <a href="{{route('subscription.aktifkan', $id)}}" class="btn btn-sm btn-success p-0 px-2">
    Aktif
  </a>
  <button type="submit" onclick="return confirm('Anda yakin nomor langganan ini akan diputus permanen?')" class="btn btn-sm btn-danger p-0 px-2">
    P. Permanen
  </button>
</form>
@endif

<!-- Hanya untuk status putus permanen -->
@if ($subs_status == 7)
<div class="text-left">
  <a href="{{route('subscription.aktifkan', $id)}}" class="btn btn-sm btn-success p-0 px-2">
    Aktifkan Kembali
  </a>
</div>
@endif

<!-- Hanya untuk status registrasi ulang -->
@if ($subs_status == 8)
<form action="{{route('subscription.cancel', $id)}}" method="POST" class="text-left">
  @csrf
  <a href="{{route('subscription.edit', $id)}}" class="edit-subs btn btn-sm btn-info p-0 px-2">
    Edit
  </a>
  <button type="submit" onclick="return confirm('Anda yakin langganan ini akan dicancel?, tagihan yang belum dibayarkan untuk langganan ini juga akan dihapus!.\nNomor langganan ini akan diubah statusnya kembali menjadi putus sementara')" class="btn btn-sm btn-danger p-0 px-2">
    Cancel
  </button>
</form>
@endif