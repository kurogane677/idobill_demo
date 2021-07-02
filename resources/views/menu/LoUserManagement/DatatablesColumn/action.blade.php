<form action="/lo_group/{{$group_id}}/lo_user/{{$user_id}}" method="POST">
  @csrf
  @method("delete")

  <a href="/lo_group/{{$group_id}}/lo_user/{{$user_id}}/edit" class="btn btn-sm btn-info p-0 px-2">
    Edit
  </a>

  @if (Auth::id()!=$user_id)
  <button type="submit" onclick="return confirm('Anda yakin user ini ingin dihapus?')" class="btn btn-sm btn-danger p-0 px-2">
    Delete
  </button>
  @endif
</form>