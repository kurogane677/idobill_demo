<form method="POST" action="{{ route('logout') }}" class="w-100">
  @csrf
  <button class="nav-link px-3 wbtn-logout text-left w-100">
    <svg class="bi" width="16" height="16" fill="currentColor">
      <use href="{{asset("bootstrap-icons.svg#door-open-fill")}}" />
    </svg>
    <span class="text px-2">Logout</span>
  </button>
</form>