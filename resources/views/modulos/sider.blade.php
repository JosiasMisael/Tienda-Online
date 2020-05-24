<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

   <!-- Categorias -->
   <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-list-alt"></i>
      <p>
        Categorias
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
      <a href="{{ route('admin.category.index')}}" class="nav-link">
          <i class="far fa-address-book"></i>
          <p>Listado de Categorías</p>
        </a>
      </li>
      <li class="nav-item">
      <a href="{{route('admin.category.create') }}" class="nav-link">
          <i class="fas fa-plus"></i>
          <p>Crear Categorias</p>
        </a>
      </li>
    </ul>
  </li>

    </ul>
</nav>
