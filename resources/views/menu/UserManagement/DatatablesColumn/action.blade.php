<div class="text-left flex-center">

  <form action="{{route('user_management.email',$id)}}" method="POST">
    @csrf
    <button type="submit" onclick="return sendEmail('{{$email}}')" class="btn btn-sm btn-success p-0 px-2">
      Invite
    </button>
  </form>

  <a @if ($type=='CUS' ) href="{{route('customer.edit',$id)}}" @else href="{{route('user_management.edit',$id)}}" @endif class="btn btn-sm btn-info p-0 px-2 mx-1">
    Edit
  </a>

  <form action="{{route('user_management.destroy',$id)}}" method="POST">
    @csrf
    @method("delete")

    @if (Auth::id()!=$id)
    <button type="submit" onclick="return confirm('Anda Yakin User ini ingin dihapus?')" class="btn btn-sm btn-danger p-0 px-2">
      Delete
    </button>
    @endif

  </form>



</div>