<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login.page') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('registration.page') }}">Ragistration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('logout') }}">Logout</a>
        </li>


      </ul>
    </div>
  </div>
</nav>
