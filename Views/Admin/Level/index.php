<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Level</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Level</li>
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
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter" style="float: right;"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th>ID</th>
                <th>Name</th>
                <th>Rate</th>
                <th>Tool</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach($data["list"] as $arr)
                    {
                        ?>
                        <tr>
                            <td style="width:10%" id="id_level"><?= $arr["id_level"]?></td>
                            <td style="width:50%" id="name_level"><?= $arr["name"]?></td>
                            <td style="width:20%" id="rate"><?= $arr["rate"]?></td>
                            <td style="width:30%">
                            <button class="btn btn-success btn-sm edit" ><i class="fas fa-pencil-alt"></i> Edit</button>
                            <button class="btn btn-danger btn-sm delete" ><i class="fas fa-pencil-alt"></i> Delete</button>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
               </tbody>
                <tfoot>
                <tr>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" style="float: right;" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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
    <?php
  include("modal.php")
  ?>
  </div>
  <script>
    $("#add").click(function(){
      var name = $("#modal-add #name").val();
      var rate = $("#modal-add #rate").val();
      $.ajax({
        type: "POST",
        url: "./level/add",
        data: {name:name, rate:rate},
        dataType: "Json",
        success: function (data) {
          console.log(data);
          if(data==true)
          {
            $("#modal-add").remove();
            $('.modal-backdrop').remove();
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

    $(".edit").click(function(){
      $("#modal-secondary").modal("show");
      $("#modal-secondary #id").val($(this).parents("tr").find("td:first-child").text());
      $("#modal-secondary #name").val($(this).parents("tr").find("td:nth-child(2)").text());
      $("#modal-secondary #rate").val($(this).parents("tr").find("td:nth-child(3)").text());
    })
    $("#edit").click(function(){
      var id = $("#modal-secondary #id").val();
      var name = $("#modal-secondary #name").val();
      var rate = $("#modal-secondary #rate").val();
        $.ajax({
          type: "POST",
          url: "./level/edit",
          data: {id:id, name:name, rate:rate},
          dataType: "json",
          success: function (data) {
            console.log(data);
          if(data==true)
          {
            $("#modal-secondary").remove();
            $('.modal-backdrop').remove();
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
       })
      })
      $(".delete").click(function()
      {
        var id = $(this).parents("tr").find("td:first-child").text();
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            console.log(id);
            $.ajax({
              type: "POST",
              url: "./Level/delete",
              data: {id:id},
              dataType: "json",
              success: function (response) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                ).then((result)=> {
                    location.reload();
                })
              }
            });
          }
        })
      })
  </script>

