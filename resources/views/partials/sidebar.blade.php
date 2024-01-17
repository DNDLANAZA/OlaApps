<aside id="sidebar" class="sidebar">
      
  <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="bi bi-grid"></i>
            <span>Ola Apps Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="{{ route('product.index') }}">
                <i class="bi bi-menu-button-wide"></i><span>Incoming Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                
                <li>
                    <a href="{{ route('product.index') }}">
                        <i class="bi bi-circle"></i><span>Manage product</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('producttype.index') }}">
                        <i class="bi bi-circle"></i><span>Product type</span>
                    </a>
                </li>
            </ul>
        </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Outbound products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">   
                <li>
                    <a href="{{ route('stock.index') }}">
                        <i class="bi bi-circle"></i><span>Manage stock</span>
                    </a>
                </li>
            <li>
            <a href="{{ route('check.out') }}">
                <i class="bi bi-circle"></i><span>Check stock</span>
            </a>
            </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#check-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-book"></i><span>Check Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="check-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('check.index') }}">
                    <i class="bi bi-circle"></i><span>Check in</span>
                </a>
                <a href="{{ route('check.out') }}">
                    <i class="bi bi-circle"></i><span>Check out</span>
                </a>
            </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#manager-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Manage Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="manager-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('manager.index') }}">
                    <i class="bi bi-circle"></i><span>Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('role.index') }}">
                    <i class="bi bi-circle"></i><span>Role</span>
                </a>
            </li>
            <li>
                <a href="{{ route('rus.index') }}">
                    <i class="bi bi-circle"></i><span>User_Role</span>
                </a>
            </li>
        </ul>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href=" {{ route('logout') }} " onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-in-left"></i>
            <span>Sign Out</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>

  </ul>

</aside>
<script type="text/javascript">
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('a');
    const menuLength = menuItem.length;
    for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].className = "nav-link collapsed active";
        }
    }
</script>