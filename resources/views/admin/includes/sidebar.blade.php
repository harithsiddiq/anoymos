<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <!--  -->
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('asset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('admin.setting') }}" class="nav-link active">
                        <i class="nav-icon fas fa-dashboard"></i>
                        <p>
                           Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ active_link('admins')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ trans('dash.Admin_Account') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('admins')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('admins.index') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('dash.Admin_Account') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ active_link('users')[0] }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ trans('dash.User_Account') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('users')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link active">
                                <p>{{ trans('dash.User_Account') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?level=company" class="nav-link active">
                                <p>{{ trans('dash.level.company') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?level=user" class="nav-link active">
                                <p>{{ trans('dash.level.user') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?level=vendor" class="nav-link active">
                                <p>{{ trans('dash.level.vendor') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ active_link('countries')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('dash.country') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('countries')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('country.country') }}" class="nav-link active">
                                <i class="fa fa-plus-square"></i>
                                <p>{{ trans('dash.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('country.index') }}" class="nav-link active">
                                <i class="fa fa-flag"></i>
                                <p>{{ trans('dash.country') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ active_link('cities')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('dash.city') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('cities')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('city.create') }}" class="nav-link active">
                                <i class="fa fa-plus-square"></i>
                                <p>{{ trans('dash.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('city.index') }}" class="nav-link active">
                                <i class="fa fa-flag"></i>
                                <p>{{ trans('dash.city') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ active_link('states')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('dash.state') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('states')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('state.create') }}" class="nav-link active">
                                <i class="fa fa-plus-square"></i>
                                <p>{{ trans('dash.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('state.index') }}" class="nav-link active">
                                <i class="fa fa-flag"></i>
                                <p>{{ trans('dash.state') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ active_link('departments')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('dash.department') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('departments')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('departments.create') }}" class="nav-link active">
                                <i class="fa fa-plus-square"></i>
                                <p>{{ trans('dash.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('departments.index') }}" class="nav-link active">
                                <i class="fa fa-flag"></i>
                                <p>{{ trans('dash.department') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ active_link('brands')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('dash.brand') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('brands')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('brand.create') }}" class="nav-link active">
                                <i class="fa fa-plus-square"></i>
                                <p>{{ trans('dash.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brand.index') }}" class="nav-link active">
                                <i class="fa fa-flag"></i>
                                <p>{{ trans('dash.brand') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ active_link('manufacturers')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('dash.manufacturer') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('manufacturers')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('manufacturer.create') }}" class="nav-link active">
                                <i class="fa fa-plus-square"></i>
                                <p>{{ trans('dash.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manufacturer.index') }}" class="nav-link active">
                                <i class="fa fa-flag"></i>
                                <p>{{ trans('dash.manufacturer') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ active_link('shipping')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('dash.shipping') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('shipping')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('shipping.create') }}" class="nav-link active">
                                <i class="fa fa-plus-square"></i>
                                <p>{{ trans('dash.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('shipping.index') }}" class="nav-link active">
                                <i class="fa fa-flag"></i>
                                <p>{{ trans('dash.shipping') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ active_link('malls')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('dash.mall') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('malls')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('mall.create') }}" class="nav-link active">
                                <i class="fa fa-plus-square"></i>
                                <p>{{ trans('dash.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mall.index') }}" class="nav-link active">
                                <i class="fa fa-flag"></i>
                                <p>{{ trans('dash.mall') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ active_link('colors')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('dash.color') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('colors')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('color.create') }}" class="nav-link active">
                                <i class="fa fa-plus-square"></i>
                                <p>{{ trans('dash.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('color.index') }}" class="nav-link active">
                                <i class="fa fa-flag"></i>
                                <p>{{ trans('dash.color') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ active_link('size')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('dash.size') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('size')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('size.create') }}" class="nav-link active">
                                <i class="fa fa-plus-square"></i>
                                <p>{{ trans('dash.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('size.index') }}" class="nav-link active">
                                <i class="fa fa-flag"></i>
                                <p>{{ trans('dash.size') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ active_link('products')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('dash.product') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ active_link('products')[1] }}">
                        <li class="nav-item">
                            <a href="{{ route('product.create') }}" class="nav-link active">
                                <i class="fa fa-plus-square"></i>
                                <p>{{ trans('dash.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}" class="nav-link active">
                                <i class="fa fa-flag"></i>
                                <p>{{ trans('dash.product') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
