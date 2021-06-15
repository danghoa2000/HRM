  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center" id="div_avatar">
                <input type="hidden" value="<?php echo $data["data"][0]["id_employee"] ?>" id="id">
                  <img class="profile-user-img img-fluid img-circle" id="avt"
                       src="./Public/Interface/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $data["data"][0]["name"] ?></h3>

                <p class="text-muted text-center">
                <?php
                foreach( $data["position"] as $arr)
                {
                  if($arr["id_position"] ==   $data["data"][0]["id_position"] )
                  {
                    echo $arr["name"];
                  }
                }
                ?>
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                <?php
                foreach( $data["level"] as $arr)
                {
                  if($arr["id_level"] ==   $data["data"][0]["id_level"] )
                  {
                    echo $arr["name"];
                  }
                }
                ?>
                </p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">
                <?=$data["data"][0]["address"]?>
                </p>
                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="activity">
                  <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                        <select class="form-control select2" id="department">
                        <option value="default" selected="selected">-- Choose option --</option>
                            <?php
                                foreach($data["department"] as $arr)
                                {
                                    ?>
                                    <option value = "<?=$arr['id_department']?>" <?php if($arr['id_department']==$data["data"][0]["id_department"]) echo "selected = 'selected'"?>> <?= $arr["name"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>  
                        <small class="err_department"></small>
                       </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Schedule</label>
                        <div class="col-sm-10">
                        <select class="form-control select2" id="schedule">
                            <option value="default">-- Choose option --</option>
                            <?php
                                foreach($data["schedule"] as $arr)
                                {
                                    ?>
                                    <option value = "<?=$arr['id_schedule']?>" <?php if($arr['id_schedule']==$data["data"][0]["id_schedule"]) echo "selected = 'selected'"?>> <?= $arr["time_in"] ?> - <?= $arr["time_out"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>  
                        <small class="err_schedule"></small>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Position</label>
                        <div class="col-sm-10">
                        <select class="form-control select2" id="position">
                            <option value="default">-- Choose option --</option>
                            <?php
                                foreach($data["position"] as $arr)
                                {
                                    ?>
                                    <option value = "<?=$arr['id_position']?>" <?php if($arr['id_position']==$data["data"][0]["id_position"]) echo "selected = 'selected'"?>> <?= $arr["name"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>  
                        <small class="err_schedule"></small>
                          </div>
                      </div>
                      <div class="form-group row">
                      <span type="button" class="btn btn-dark save" id="save1">Save changes</span>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" placeholder="Name" value="<?= $data["data"][0]["name"]?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter name" value="<?= $data["data"][0]["email"]?>">
                        <small class="err_name"></small></div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                        <select class="form-control select2" id="gender">
                            <option value="default">-- Choose option --</option>
                            <option value = "1" <?php if(1==$data["data"][0]["gender"]) echo "selected = selected"?>>Male</option>
                            <option value = "2" <?php if(2==$data["data"][0]["gender"]) echo "selected = selected"?>>Female</option>
                        </select>  
                        <small class="err_gender"></small>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone" value="<?= $data["data"][0]["phone"]?>">
                        <small class="err_phone"></small>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value="<?= $data["data"][0]["address"]?>">
                        <small class="err_address"></small>
                       </div>
                      </div>
                      <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                        <select class="form-control select2" id="status">
                            <option value="default" >-- Choose option --</option>
                            <option value = "1" <?php if(1==$data["data"][0]["status"]) echo "selected = 'selected'"?>>Online</option>
                            <option value = "2" <?php if(2==$data["data"][0]["status"]) echo "selected = 'selected'"?>>Off</option>
                        </select> 
                        <small class="err_status"></small>
                        </div>
                      </div>
                      <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Level</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" id="level">
                        <option value="default">-- Choose option --</option>
                            <?php
                                foreach($data["level"] as $arr)
                                {
                                    ?>
                                    <option value = "<?=$arr['id_level']?>" <?php if($arr['id_level']==$data["data"][0]["id_level"]) echo "selected = selected"?>> <?= $arr["name"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>  
                        <small class="err_level"></small>
                      </div>
                      </div>
                      <div class="form-group row">
                      <span type="button" class="btn btn-dark save" id="save2">Save changes</span>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <script>
    $("#save2").click(function()
    {
      var name = $("#name").val();
      var gender = $("#gender option:selected").val();
      var email = $("#email").val();
      var phone = $("#phone").val();
      var address = $("#address").val();
      var level = $("#level option:selected").val();
      var status = $("#status option:selected").val();
      $.ajax({
        type: "POST",
        url: encodeURI("./employee/update1/"+$("#id").val()),
        data: {name:name,gender:gender,email:email,phone:phone,address:address,level:level,status:status},
        dataType: "json",
        success: function (data) {
          console.log(data);
          if(data==true)
          {
            Swal.fire({
                title:'Success!',
                icon:'success',
                confirmButtonText: `Save`,
              }).then((result) => {
                  location.reload();
              })
          }
          else
          {
            if(data==0)
            {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
              })
            }
          }
        }
      });
    })
    $("#save1").click(function()
    {
      var department = $("#department option:selected").val();
      var schedule = $("#schedule option:selected").val();
      var position = $("#position").val();
      $.ajax({
        type: "POST",
        url: encodeURI("./employee/update2/"+$("#id").val()),
        data: {department:department,schedule:schedule,position:position},
        dataType: "json",
        success: function (data) {
          console.log(data);
          if(data==true)
          {
            Swal.fire({
                title:'Success!',
                icon:'success',
                confirmButtonText: `Save`,
              }).then((result) => {
                  location.reload();
              })
          }
          else
          {
            if(data==0)
            {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
              })
            }
          }
        }
      });
    })
  </script>