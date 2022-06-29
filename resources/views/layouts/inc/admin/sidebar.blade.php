<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#category-collapse" aria-expanded="false" aria-controls="category-collapse">
          <i class="mdi mdi-menu menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="category-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category') }}">Category List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category/create') }}">Add Category</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#product-collapse" aria-expanded="false" aria-controls="product-collapse">
          <i class="mdi mdi-note-plus-outline menu-icon"></i>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="product-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products') }}">View Products</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products/create') }}">Add Product</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/brands') }}">
          <i class="mdi mdi-menu menu-icon"></i>
          <span class="menu-title">Brands</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/users') }}">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>