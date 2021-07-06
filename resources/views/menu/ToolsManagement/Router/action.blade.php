<form action="{{ route('router.destroy', $id) }}" method="POST">
  @csrf
  @method("delete")

  <a href="{{route('router.edit', $id)}}" class="btn btn-sm btn-info p-0 px-2">
    Edit
  </a>

  <button type="submit" onclick="return confirm('Anda Yakin Router ini ingin dihapus?')" class="btn btn-sm btn-danger p-0 px-2">
    Delete
  </button>

</form>