<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item" id="set">
        <span class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        </span>
        <div class="user">
          <div class="head" style="text-align:center"> 
          <img class="profile-user-img img-fluid img-circle"
                       src="Views/Admin/Employee/Upload/<?=isset($data_staff)?$data_staff[0]["avatar"]:"admin.jpg" ?>"
                       alt="User profile picture" style="width: 90px;height: 90px;">
          <p><?=isset($data_staff)? $data_staff[0]["name"]:"unknow" ?> 
           <small style="display: block;">Menber since <?=isset($data_staff)?$data_staff[0]["create_on"]:"" ?></small>
           </p>
          </div>
          <div class="foot">
            <div class="right" id="view-info">
            <div>
            <span>Profile</span></div>
            </div>
            <div class="left" id="logout">
            <div>
            <span>Logout</span></div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->