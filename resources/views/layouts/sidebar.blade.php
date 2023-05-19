<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
    </div>


    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{route('admins.index')}}" class="nav-link">
                    <i class="fas fa-user-shield nav-icon"></i>
                    <p>Admins</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                    <i class="fas fa-user-md nav-icon"></i>
                    <p>Users</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                    <i class="fas fa-bars nav-icon"></i>
                    <p>Books Categories</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('books.index')}}" class="nav-link">
                    <i class="fas fa-book nav-icon"></i>
                    <p>Audio Books</p>
                </a>
            </li>



        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
</aside>
