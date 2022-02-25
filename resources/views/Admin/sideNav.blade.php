<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/admin" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info ml-3">
                <span>Welcome,</span>
                <h2>{{Session::get('admin')['name']}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <hr class="bg-white">
                <h3>General</h3>
                <hr class="bg-white">
                <ul class="nav side-menu">
                  <li><a href="/admin"><i class="fa fa-users"></i> Customer Management <span></span></a>
                  </li>
                  <li><a href="/order_management"><i class="fal fa-table"></i> Order Management <span ></span></a>
                  </li>
                  <li><a><i class="fas fa-users-cog"></i> Products Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/add_product">Add Products</a></li>
                      <li><a href="/product_details">Products Detail</a></li>
                    </ul>
                  </li>
                  <li><a href="/banner_management"><i class="fas fa-images"></i> Banner <span></span></a>
                  </li>
                  <li><a href="/category"><i class="fas fa-filter"></i> Category <span></span></a>
                  </li>
                  <li><a href="/contact"><i class="fas fa-address-book"></i> Contact <span></span></a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    {{Session::get('admin')['name']}}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      
                    <a class="dropdown-item"  href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->