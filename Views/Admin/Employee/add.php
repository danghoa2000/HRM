<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">employee - add</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <button class="btn btn-primary" id="add-staff"><i class="fas fa-plus"> Create</i></button> 
              <a class="btn btn-danger" href="./employee/"><i class="fas fa-backspace"> Cancel</i></a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                        <small class="err_name"></small>
                        </div>
                        <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control select2" id="gender">
                            <option value="default" selected="selected">-- Choose option --</option>
                            <option value = "1" >Male</option>
                            <option value = "2" >Female</option>
                        </select>
                        <small class="err_gender"></small>
                        </div>
                        <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone">
                        <small class="err_phone"></small>
                        </div>
                        <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter address">
                        <small class="err_address"></small>
                        </div>
                        <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2" id="status">
                            <option value="default" selected="selected">-- Choose option --</option>
                            <option value = "1" >Online</option>
                            <option value = "2" >Off</option>
                        </select>  
                        <small class="err_status"></small>
                        </div>
                        <div class="form-group">
                        <label>Email</label>
                        <input type="mail" name="email" class="form-control" id="email" placeholder="Enter email">
                        <small class="err_email"></small>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Position</label>
                        <select class="form-control select2" id="position">
                            <option value="default" selected="selected">-- Choose option --</option>
                            <?php
                                foreach($data["position"] as $arr)
                                {
                                    ?>
                                    <option value = "<?=$arr['id_position']?>"> <?= $arr["name"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>  
                        <small class="err_position"></small>
                        </div>
                        <div class="form-group">
                        <label>Schedule</label>
                        <select class="form-control select2" id="schedule">
                            <option value="default" selected="selected">-- Choose option --</option>
                            <?php
                                foreach($data["schedule"] as $arr)
                                {
                                    ?>
                                    <option value = "<?=$arr['id_schedule']?>"> <?= $arr["time_in"] ?> - <?= $arr["time_out"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>  
                        <small class="err_schedule"></small>
                        </div>
                        <div class="form-group">
                        <label>Level</label>
                        <select class="form-control select2" id="level">
                        <option value="default" selected="selected">-- Choose option --</option>
                            <?php
                                foreach($data["level"] as $arr)
                                {
                                    ?>
                                    <option value = "<?=$arr['id_level']?>"> <?= $arr["name"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>  
                        <small class="err_level"></small>
                        </div>
                        <div class="form-group">
                        <label>Department</label>
                        <select class="form-control select2" id="department">
                        <option value="default" selected="selected">-- Choose option --</option>
                            <?php
                                foreach($data["department"] as $arr)
                                {
                                    ?>
                                    <option value = "<?=$arr['id_department']?>"> <?= $arr["name"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>  
                        <small class="err_department"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar">
                                <label class="custom-file-label" for="avatar">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <small class="input-group-text" id="">Upload</small>
                            </div>
                            </div>
                            <small class="err_file"></small>
                        </div>
                    </div>
                 </div>
            </div>
           </div>
      </div>
      </div>
    </section>
</div>
<script>
    
    $("#add-staff").click(function(e){
        $("small").html("");
        e.preventDefault();
        var name = $("#name").val();
        var gender = $("#gender option:selected").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var level = $("#level option:selected").val();
        var status = $("#status option:selected").val();
        var schedule = $("#schedule option:selected").val();
        var position = $("#position option:selected").val();
        var department = $("#department option:selected").val();
        var avatar = $("#avatar")[0].files[0];

        var form = new FormData();
        form.append("avatar",avatar);
        form.append("name",name);
        form.append("gender",gender);
        form.append("email",email);
        form.append("phone",phone);
        form.append("address",address);
        form.append("status",status);
        form.append("schedule",schedule);
        form.append("position",position);
        form.append("department",department);
        form.append("level",level);
        $.ajax({
            type: "POST",
            url: "./Employee/insert/",
            data: form,
            contentType: false,
            mimeType:"mutipart/form-data",
            processData: false,
            // dataType:"json",
            success: function (data) {
                console.log(data)
                if(data == 1)
                {
                    Swal.fire({
                        title: 'Success',
                        text: "Go to home page ?",
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes !'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "./employee/"
                        }
                        else
                        location.reload();
                        })
                }
                else
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>Why do I have this issue?</a>'
                    })
                var result = [];
                result = JSON.parse(data);
                for(var i = 0; i < result.length; i++)
                    {
                        console.log(result[i]);
                        $(".err_" + result[i]+ "").html("*Errorr").css("color","red")
                    }
                }
                return false;
            },
            error: function(e){
                console.log(e)
            }
        });

    })
    $("#email").keyup(function()
    {
        var email = $(this).val()
        $(".err_email").html("")
        if(email)
        {
            $.ajax({
                type: "POST",
                url: "./employee/checkemail/",
                data: {email:email},
                dataType: "json",
                success: function (response) {
                    $(".err_email").html(response).css("color","red")
                }
            });
        }
    })
</script>