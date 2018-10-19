<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Chatty</a>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      @if (Auth::check())
      <li class="nav-item">
        <a class="nav-link" href="#">Timeline</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Friends</a>
      </li>
      @endif
      @if (Auth::check())
      <li class="nav-item">
        <b>{{ Auth::user()->getNameOrUsername() }}</b>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Update profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('signout') }}">Sign Out</a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="{{ route('signup') }}">Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('signin') }}">Sign In</a>
      </li>
      @endif
    </ul>
</nav>
