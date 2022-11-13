<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon">
    </div>
    <div class="sidebar-brand-text mx-3">Real Estate Admin</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Features
  </div>

  <!-- Categories -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
      aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="far fa-fw fa-window-maximize"></i>
      <span>Categories</span>
    </a>
    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Category</h6>
        <a class="collapse-item" href="{{route('category.index')}}">All</a>
        <a class="collapse-item" href="{{route('category.create')}}">Create</a>
      </div>
    </div>
  </li>

  {{-- Properties --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-table"></i>
      <span>Properties</span>
    </a>
    <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Properties</h6>
        <a class="collapse-item" href="{{route('property.index')}}">View</a>
        <a class="collapse-item" href="{{route('property.create')}}">Create</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
      aria-expanded="true" aria-controls="collapseBootstrap4">
      <i class="far fa-fw fa-window-maximize"></i>
      <span>Users</span>
    </a>
    <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Users </h6>
        <a class="collapse-item" href="{{route('user.index')}}">View all users</a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider">

  {{-- Logout --}}
  <li class="nav-item">
    <a
      href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
      class="dropdown-item text-gray-600"
    >
      <i class="fas fa-sign-out-alt text-gray-600 mr-1"></i>Logout
    </a>
    <form action="{{route('logout')}}" id="logout-form" method="POST" style="display: none;">@csrf</form>
  </li>



</ul>
