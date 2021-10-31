<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('admin.dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ url('/') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Visit Site</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('brands') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Brands</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
                    <li><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All Sub Category</a>
                    </li>
                    <li><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub Sub
                            Category</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Manage Product</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>
                    <li><a href="{{ route('manage.product') }}"><i class="ti-more"></i>All Product</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('sliders') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Sliders</span>
                </a>
            </li>


        </ul>
    </section>

</aside>
