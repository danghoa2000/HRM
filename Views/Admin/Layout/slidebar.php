<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="./Public/Interface/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="Views/Admin/Employee/Upload/<?=isset($data_staff)?$data_staff[0]["avatar"]:"admin.jpg" ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=isset($data_staff)?$data_staff[0]["name"]:"Unknow  " ?></a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="./home/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./attendance/" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Attendance
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">5</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./department/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./position/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Position</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./level/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./schedule/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schelude</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./cashadvance/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Cash Advance
                  </p>
                </a>
              </li>
            </ul>
              <li class="nav-item">
                <a href="./employee/" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Employee
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./overtime/" class="nav-link">
                  <i class="nav-icon fas fa-stopwatch"></i>
                  <p>
                   Overtime
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./leaves/" class="nav-link">
                  <i class="nav-icon fas fa-place-of-worship"></i>
                  <p>
                   Employee Leaves
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./schedulelist/" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                   Schedule
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./salary/" class="nav-link">
                  <i class="nav-icon fas fa-money-bill-wave"></i>
                  <p>
                   Salary
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./account/" class="nav-link">
                  <i class="nav-icon far fa-user-circle"></i>
                  <p>
                   Account
                  </p>
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
