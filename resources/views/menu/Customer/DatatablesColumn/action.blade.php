<form action="{{route('customer.destroy', $id)}}" method="POST">
  @csrf
  @method("delete")

  <a href="{{route('customer.edit', $id)}}" class="btn btn-sm btn-info p-0 px-2">
    Edit
  </a>

  @if (Auth::id()!=$id)
  <button type="submit" onclick="return confirm('Anda Yakin Customer ini ingin dihapus?')" class="btn btn-sm btn-danger p-0 px-2">
    Delete
  </button>
  @endif
</form>