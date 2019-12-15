<header class="main-header">
    <a href="<?php echo $this->uri('admin', 'admin')?>" class="logo">
        <span class="logo-mini"><b>S</b>N</span>
        <span class="logo-lg"><b>Stanimira</b>Nikolova</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="<?php echo $this->uri('admin', 'admin')?>" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
    </nav>
</header>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="<?php echo $this->uri('admin', 'admin')?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo $this->uri('admin', 'menu')?>"><i class="fa fa-circle-o"></i>Menu</a></li>
                    <li class="active"><a href="<?php echo $this->uri('admin', 'pages')?>"><i class="fa fa-circle-o"></i>Pages</a></li>
                    <li class="active"><a href="<?php echo $this->uri('admin', 'users')?>"><i class="fa fa-circle-o"></i>Users</a></li>
                </ul>
            </li>
            <li><a href="<?php echo $this->uri('admin', 'logout')?>"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
