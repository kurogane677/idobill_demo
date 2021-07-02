<form action="{{route('ug_management.destroy', $id)}}" method="POST" class="text-left">
  @csrf
  @method("delete")

  <a href="{{route('ug_access.edit', $id)}}" class="btn btn-sm btn-warning p-0 px-2">
    Access
  </a>

  <a href="{{route('ug_management.edit', $id)}}" class="btn btn-sm btn-info p-0 px-2 mx-1">
    Edit
  </a>

  @if ($total == 0)
  <button type="submit" onclick="return confirm('Anda yakin ini akan dihapus?')" class="btn btn-sm btn-danger p-0 px-2">
    Delete
  </button>
  @endif

</form>