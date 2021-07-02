<li class="nav-item mb-1" id="{{$id}}">
  <a href="{{$href}}" class="nav-link px-3" style="color:{{$color}};" data-color="{{$color}}">
    <svg class="bi" width="16" height="16" fill="currentColor">
      <use href="{{asset("bootstrap-icons.svg#".$icon)}}" />
    </svg>
    <span class="text px-2" data-color="{{$color}}" style="color:{{$color}};">{{$title}}</span>
  </a>
</li>