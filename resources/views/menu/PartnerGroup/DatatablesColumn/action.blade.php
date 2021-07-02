<form action="{{route('partner_group.destroy', $id)}}" method="POST">
  @csrf
  @method("delete")

  <a href="{{route('partner_user.index', $id)}}" class="btn btn-sm btn-warning p-0 px-2">
    Users
  </a>

  <a href="{{route('partner_group.edit', $id)}}" class="btn btn-sm btn-info p-0 px-2">
    Edit
  </a>

  @if (Auth::id()!=$id)
  <button type="submit" onclick="return confirm('Anda yakin Group Partner ini ingin dihapus?')" class="btn btn-sm btn-danger p-0 px-2">
    Delete
  </button>
  @endif
</form>