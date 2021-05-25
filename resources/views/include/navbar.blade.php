@include('include.upperNavbar')

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #b11d22">
  <div class="container">
    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/"><i class="fa fa-fw fa-search"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/lessfortunates">Less Fortunate</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/reports">Report</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/login" class="btn btn-outline-light"><b>Login</b></a></li>
      </ul>
    </div>
  </div>
</nav>