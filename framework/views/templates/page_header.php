<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
?>
<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand"><b>Plain</b>Surf</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse pull-left collapse in header-input" id="navbar-collapse" aria-expanded="true">
                <form class="navbar-form navbar-left header-input-form" role="search">
                    <div class="form-group header-input-form">
                        <input type="text" class="form-control header-input-form-input" id="navbar-search-input" placeholder="http://">
                    </div>
                </form>
            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu right-0-sm">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <?php
                            if(isset($_SESSION['sid']) && !empty($_SESSION['sid'])) {
                            ?>
                                 <img src="/assets/dist/img/person-male.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="/assets/dist/img/person-male.png" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $_SESSION['username'];?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="/setting" class="btn btn-default btn-flat">Setting</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/logout" class="btn btn-default btn-flat">Sign Out</a>
                                    </div>
                                </li>
                            </ul>
                            <?php
                        } else {
                            ?>
                            <img src="/assets/dist/img/person-male.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">Unknown User</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="/assets/dist/img/person-male.png" class="img-circle" alt="User Image">
                                    <p>
                                        Unknown User
                                        <small>Be a Member</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="/login" class="btn btn-default btn-flat">Sign In</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/register" class="btn btn-default btn-flat">Sign Up</a>
                                    </div>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
