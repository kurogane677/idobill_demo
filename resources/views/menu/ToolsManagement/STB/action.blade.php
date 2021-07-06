<div class="flex-center">

  <a href="{{route('stb.edit', $id)}}" class="btn btn-sm btn-info p-0 px-2 mr-1">
    Edit
  </a>

  @if ($link>0)
  <button type="button" class="btn btn-sm btn-danger p-0 px-2" onclick="return alert('Tidak dapat menghapus perangkat ini karena sudah digunakan!.')">
    Delete
  </button>
  @else
  <form action="{{ route("stb.destroy", $id) }}" method="POST">
    @csrf
    @method("delete")
    <button type="submit" onclick="return confirm('Anda Yakin STB ini ingin dihapus?')" class="btn btn-sm btn-danger p-0 px-2">
      Delete
    </button>
  </form>
  @endif

</div>