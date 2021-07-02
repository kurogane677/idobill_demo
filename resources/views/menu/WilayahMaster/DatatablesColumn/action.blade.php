<form action="{{route('wilayah.destroy', $id)}}" method="POST">
  @csrf
  @method("delete")

  <a href="{{route('wilayah.edit', $id)}}" class="btn btn-sm btn-info p-0 px-2">
    Edit
  </a>

  {{-- <button type="button" @if ($total_area> 0)
    onclick="return alert('Anda tidak dapat menghapus wilayah ini, karena masih ada area di dalamnya, pastikan total areanya kosong!')"
    @else
    onclick="return confirm('Anda yakin wilayah ini ingin dihapus?')"
    @endif
    class="btn btn-sm btn-danger p-0 px-2">
    Delete
  </button> --}}

  @if ($total_area == 0)
  <button type="submit" onclick="return confirm('Anda yakin wilayah ini ingin dihapus?')" class="btn btn-sm btn-danger p-0 px-2">
    Delete
  </button>
  @endif

</form>