<form action="{{ route('area.destroy', $id) }}" method="POST">
  @csrf
  @method("delete")

  <a href="{{route('area.edit', $id)}}" class="btn btn-sm btn-info p-0 px-2">
    Edit
  </a>

  @if ($total == 0)
  <button type="submit" onclick="return confirm('Anda yakin area ini ingin dihapus?')" class="btn btn-sm btn-danger p-0 px-2">
    Delete
  </button>
  @endif

</form>