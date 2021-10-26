        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation
                    </span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../home/"><img src="../img/logo_nv_top.png" alt="Netvision SA" style="border: 0px;"/></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user_id'] ?>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../admin_users/details.php?rid=<?php echo $_SESSION['user_rid'];?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../login/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="../home/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="../admin_users/"><i class="fa fa-fw fa-user"></i> Users</a>
                    </li>
                    <li>
                        <a href="../admin_subscribers/"><i class="fa fa-fw fa-institution"></i> Subscribers</a>
                    </li>
                    <li>
                        <a href="../admin_upload/"><i class="fa fa-fw fa-file"></i> Upload File</a>
                    </li>
                    <li>
                        <a href="../admin_categories/"><i class="fa fa-fw fa-archive"></i> Categories</a>
                    </li>
                    <li>
                        <a href="../admin_contents/"><i class="fa fa-fw fa-building"></i> Contents</a>
                    </li>
                    <li>
                        <a href="../admin_products/"><i class="fa fa-fw fa-barcode"></i> Products</a>
                    </li>                      
                    <li>
                        <a href="../login/logout.php"><i class="fa fa-fw fa-power-off"></i>  Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>