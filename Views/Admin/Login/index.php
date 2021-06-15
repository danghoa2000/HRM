


<div class="modal fade" id="modal-1" aria-modal="true" style="position:fixed">
        <div class="modal-dialog">
          <div class="modal-content fix bg-secondary">
                <div class="card-body">
                <div class="login-box">
                    <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Sign in to start your session</p>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="username" placeholder="Email">
                            <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="role" > 
                                <label for="role">
                                Admin
                                </label>
                            </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                            <button class="btn btn-primary btn-block" id="signin">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="social-auth-links text-center mb-3">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a>
                        </div>
                        <!-- /.social-auth-links -->

                        <p class="mb-1">
                        <a href="forgot-password.html">I forgot my password</a>
                        </p>
                        <p class="mb-0">
                        <a href="register.html" class="text-center">Register a new membership</a>
                        </p>
                    </div>
                    </div>
                </div>
                </div>
          </div>
        </div>
    <!-- /.login-card-body -->
  </div>
      <script>
      $(document).ready(function()
      {
        //   var role;
        // $('#modal-1 input:checkbox').change(
        //         function() {
        //            if( $('#modal-1 input:checkbox').attr("checked")==true)
        //            {
        //             role = 1
        //            }
        //            else
        //            {
        //             role = 2
        //            }
        //         }
        // );
        $('#modal-1 input:checkbox').change(
                function() {
                    if($('#modal-1 input:checkbox').is(":checked"))
                    {
                        $('#modal-1 input:checkbox').attr("checked",true)
                    }
                    else
                    {
                        $('#modal-1 input:checkbox').removeAttr("checked")
                    }
                })
          $("#modal-1").modal("show")
          $("#signin").click(function()
          {
              username =  $("#modal-1 #username").val();
              password = $("#modal-1 #password").val();
              role = 2;
              if( $('#modal-1 input:checkbox').attr("checked"))
                {
                    role = 1
                }
              $.ajax({
                  type: "POST",
                  url: "./login/signin/",
                  data: {username:username, password:password, role:role},
                  dataType: "json",
                  success: function (data) {
                      console.log(data)
                    if(data==true)
                    {
                        location.href = "./home/"
                    }
                    else
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid username or passwrod',
                            text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                        
                    }
                  }
              });
          })
      })
      </script>
