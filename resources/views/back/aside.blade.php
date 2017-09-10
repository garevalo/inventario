<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{asset('dist/img/avatar3.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            @if(Auth::check())
            <p>{{Auth::user()->name}}</p>
            @endif
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    {{--
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
    </form>
    <!-- /.search form -->
    --}}
    <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li>
                
            </li>

            <li>
                <a href="pages/hardware">
                    <i class="fa fa-th"></i> <span>Módulo de Hardware</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li>
                <a href="pages/software">
                    <i class="fa fa-th"></i> <span>Módulo de Software</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Mantenimiento</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/cargo"><i class="fa fa-circle-o"></i> Cargo</a></li>
                    <li><a href="/sede"><i class="fa fa-circle-o"></i> Sedes</a></li>
                    <li><a href="/gerencia"><i class="fa fa-circle-o"></i> Gerencias</a></li>
                    <li><a href="/subgerencia"><i class="fa fa-circle-o"></i> Subgerencia</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>