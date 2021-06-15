<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Account</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus"> New</i></button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Avatar</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Create On</th>
                    </tr>
                  </thead>
                  <tbody id="tab-account">
                  <?php
                    foreach($data["list"] as $arr)
                    {
                        ?>
                            <tr>
                                <td id="avatar"><img src="./Views/Admin/Employee/Upload/<?= $arr["avatar"]?>" alt=""> </td>
                                <td id="name"><?=$arr["name"]?></td>
                                <td id="username"><?=$arr["user"]?></td>
                                <td id="password">**************</td>
                                <td id="create_on"><?=$arr["create_on"]?></td>
                  
                            </tr>
                        <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   

