<nav class="main-header navbar navbar-expand navbar-light " style="color:black; background-color:#fd7e1426;">
  <!-- Left navbar links -->
  <ul class="navbar-nav ">
    <li class="nav-item">
      <a class="nav-link text-dark" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('dashboard') }}" class="nav-link text-dark">Home</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->

    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        @if(auth()->user()->photo)
          <img src="{{ asset('storage/' . auth()->user()->photo) }}" class="user-image rounded-circle shadow" alt="#" />
        @else
          <img src="{{ asset('storage/' . 'images/default-user.jpg') }}" class="user-image rounded-circle shadow"
            alt="#" />
        @endif
      </a>
    </li>
  </ul>
</nav>