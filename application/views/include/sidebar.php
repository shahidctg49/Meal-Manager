<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
<ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item">
    <a class="nav-link " href="<?= base_url('dashboard') ?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item"> 
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">        
      </li>   
    </ul>
  </li><!-- End Components Nav -->
  <li class="nav-item">   
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">     
    </ul>
  </li><!-- End Forms Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= base_url('users') ?>">
          <i class="bi bi-circle"></i><span>Users</span>
        </a>
      </li> 
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= base_url('member_information') ?>">
      <span>Members</span>
    </a>
  </li><!-- End Member Information Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= base_url('daily_exp') ?>">
      <span>Shopping</span>
    </a>
  </li><!-- End Daily Expense Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= base_url('mem_rec') ?>">
      <span>Meals</span>
    </a>
  </li><!-- End Daily Member Account Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= base_url('mem_pay') ?>">
      <span>Deposits</span>
    </a>
  </li><!-- End Member Payment Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= base_url('meal_exp') ?>">
      <span>Fixed Costs</span>
    </a>
  </li><!-- End Member Payment Nav -->
</ul>
</aside><!-- End Sidebar-->