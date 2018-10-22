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

      <li class="nav-item">
<form class="form-inline" method="GET" action="{{ route('search') }}">
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="query" placeholder="Jane Doe">

  <button type="submit" class="btn btn-outline-secondary mb-2">Search</button>
</form>
      </li>

      @endif
      @if (Auth::check())
      <li class="nav-item">
        <b><a href="{{ route('profile', ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }}</a></b>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('profile.edit') }}">Update profile</a>
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
