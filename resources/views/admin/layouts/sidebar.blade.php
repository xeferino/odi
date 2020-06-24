<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{ asset('admin/assets/images/users/1.jpg') }}" alt="users"
                                class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">{{ Auth::user()->name }}</h5>
                            <a href="{{ route('logout') }}" title="Logout" class="btn btn-circle btn-sm">
                                <i class="ti-power-off"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End User Profile-->
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.selfadministered.index') }}">
                            <i class="fas fa-object-group"></i>
                            <span class="hide-menu">Autoadministrable</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="hide-menu">Productos</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('admin.products.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-octagram"></i>
                                    <span class="hide-menu">Lista de productos</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('admin.products.upload') }}" class="sidebar-link">
                                    <i class="mdi mdi-octagram"></i>
                                    <span class="hide-menu"> Subir productos</span>
                                </a>
                            </li>
                            <!---SE AGREGA EL SIGUIENTE MENÚ--->
                            <li class="sidebar-item">
                                <a href="{{ route('admin.products.stock') }}" class="sidebar-link">
                                    <i class="mdi mdi-octagram"></i>
                                    <span class="hide-menu"> Actualizar Inventario</span>
                                </a>
                            </li>
                            <!----- MENÚ STOCK ---->
                            <li class="sidebar-item">
                                <a href="{{ route('admin.products.create') }}" class="sidebar-link">
                                    <i class="mdi mdi-octagram"></i>
                                    <span class="hide-menu">Agregar producto</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.brands.index') }}">
                            <i class="fas fa-copyright"></i>
                            <span class="hide-menu">Marcas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.tags.index') }}">
                            <i class="fas fa-tag"></i>
                            <span class="hide-menu">Categorías</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.sellers.index') }}">
                            <i class="fas fa-users"></i>
                            <span class="hide-menu">Vendedores</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false">
                            <i class="fas fa-users"></i>
                            <span class="hide-menu">Clientes</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('admin.clients.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-account-plus"></i>
                                    <span class="hide-menu">Lista de clientes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="hide-menu">Ordenes</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('admin.orders.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-account-plus"></i>
                                    <span class="hide-menu">Lista de ordenes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false">
                            <i class="fas fa-chart-line"></i>
                            <span class="hide-menu">Estadísticas</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('admin.stats.salesman') }}" class="sidebar-link">
                                    <i class="mdi mdi-account-plus"></i>
                                    <span class="hide-menu">Vendedor</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('admin.stats.clients') }}" class="sidebar-link">
                                    <i class="mdi mdi-account-plus"></i>
                                    <span class="hide-menu">Clientes</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('admin.stats.products') }}" class="sidebar-link">
                                    <i class="mdi mdi-account-plus"></i>
                                    <span class="hide-menu">Productos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
