<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="/user/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li> 
        <li><a href="/user/customerdetails"><i class="fa fa-user"></i> <span>Customer Details</span></a></li>
        <li><a href="/user/supplierdeatils"><i class="fa fa-user-circle"></i> <span>Supplier Details</span></a></li>
        <li><a href="/user/itemdetails"><i class="fa fa-clone"></i> <span>Item Details</span></a></li>
        <li class="treeview">
                  <a href="#"><i class="fa fa-plus-square"></i> Purchases
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="/user/purchases"><i class="fa fa-circle-o"></i> Item Purchases</a></li>
                    <li><a href="/user/purchasesdetails"><i class="fa fa-circle-o"></i> Purchases Details</a></li>
                  </ul>
        </li>
        <li class="treeview">
                  <a href="#"><i class="fa fa-shopping-cart"></i> Billing
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="/user/iselling"><i class="fa fa-circle-o"></i> Item Selling</a></li>
                    <li><a href="/user/serving"><i class="fa fa-circle-o"></i> Serving</a></li>
                    <li><a href="/user/billingdetails"><i class="fa fa-circle-o"></i> billing Details</a></li>
                  </ul>
        </li>
        <li><a href="/user/stockdetails"><i class="fa fa-bar-chart"></i> <span>Stock Details</span></a></li>
        <li><a href="/user/otherexpenses"><i class="fa fa-money"></i> <span>Other Expenses</span></a></li>
        <li class="treeview">
                  <a href="#"><i class="fa fa-area-chart"></i> Reports
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="/user/iselling"><i class="fa fa-circle-o"></i> Daily Reports</a></li>
                    <li><a href="/user/serving"><i class="fa fa-circle-o"></i> Monthly Reports</a></li>
                    <li><a href="/user/billingdetails"><i class="fa fa-circle-o"></i> Yearly Reports</a></li>
                  </ul>
        </li>        
        <li><a href="/user/setting"><i class="fa fa-cogs"></i> <span>Settings</span></a></li> 
        <li><a href="/user/createdby"><i class="fa fa-info-circle"></i> <span>Created By</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

