<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
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
            <div class="row">
                    <div class="col-sm-2">
                      <!-- text input -->
                      <div class="form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                      <input type="text" name="date" class="form-control" id="date1" placeholder="Enter date">
                      </div>
                    </div>
                    <div class="col-sm-3">
                    <button class="btn btn-primary small" id="search"><i class="fas fa-plus"> Search</i></button>
                    </div>
                    </div>
            </div>
           
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="tab2">
                  <thead>
                    <tr >
                      <th rowspan="2" style="vertical-align: middle;">ID Employee</th>
                      <th rowspan="2" style="vertical-align: middle;">Name</th>
                      <th colspan="6" style="text-align: center;">Info</th>
                    </tr>
                    <tr>
                    <td class="head">ID</td>
                      <td class="head">Date</td>
                      <td class="head">Time In</td>
                      <td class="head">Time Out</td>
                      <td class="head">Status</td>
                      <td class="head">Tool</td>
                    </tr>
                  </thead>
                  
                  <tbody id="tab-Attendance">
                  </tbody>
              
                </table>
                </div>
              </div>
              <div class="row">
            <div class="col-sm-12 col-md-5">
              <div class="dataTables_info" id="example1_info" role="status" aria-live="polite"></div>
            </div>
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" style="float: right;" id="example1_paginate">
                <ul class="pagination">
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade " id="modal-edit" aria-modal="true">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title title"></h4>
              <input type="hidden" id="id_emp" value="">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal">
                <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ID </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="id">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Time In </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="time_in">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Time Out </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="time_out">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light" id="edit">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
   <script>
      $(document).on("click", ".delete", function()
      {
        var id = $(this).parents("tr").find("#id").text();
        console.log(id)
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
            $.ajax({
              type: "POST",
              url: "./attendance/delete",
              data: {id:id},
              dataType: "json",
              success: function (response) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                ).then((result)=> {
                  index = ($("ul.pagination li.active").find("span").attr("data-dt-idx"));
                  name = $("#search").val();
                  date = $("#date1").val();
                  getData(name,date ,index)
                })
              }
            });
          }
        })
    })
    
    $(document).on("click", ".edit", function(){
      $("#modal-edit").modal("show");
      $("#modal-edit .title").html($(this).parents().parents().find("#name_staff").text() +" : "+ $(this).parents("tr").find("#date").text())
      $("#modal-edit #id").val($(this).parents("tr").find("#id").text());
      $("#modal-edit #id_emp").val($(this).parents().parents().find("#id_staff").text());
      $("#modal-edit #time_in").val($(this).parents("tr").find("#time_in").text());
      $("#modal-edit #time_out").val($(this).parents("tr").find("#time_out").text());
    })
    $(document).on("click", "#edit", function(){
      var id = $("#modal-edit #id").val();
      var id_staff = $("#modal-edit #id_emp").val();
      var time_in = $("#modal-edit #time_in").val();
      var time_out = $("#modal-edit #time_out").val();
        $.ajax({
          type: "POST",
          url: "./attendance/update",
          data: {id:id, id_staff:id_staff,time_in:time_in, time_out:time_out},
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
                  index = ($("ul.pagination li.active").find("span").attr("data-dt-idx"));
                  name = $("#search").val();
                  date = $("#date1").val();
                  getData(name,date ,index)
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
      $(document).ready(function(){

        today = new Date();
        $("#date1").val(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate())
        name = $("#name").val();
        date = $("#date1").val();
        getData(name, date, 1)
      
      })
      function loaddata(data)
  {
    var a = "";
        for(var i = 0; i< data.length; i++)
        {
          a+= '<tr>'
          a+=  '<td id="id_staff" rowspan="'+(data[i]["inf"].length+1)+'">'+data[i]["id_employee"] +'</td>'
          a+= ' <td id="name_staff" rowspan="'+(data[i]["inf"].length+1)+'">'+data[i]["name"] +'</td>'
          for(var j = 0; j<data[i]["inf"].length; j++)
          {
            a+= '<tr>'
            a+=  '<td id="id">'+data[i]["inf"][j]["id_attendance"]+'</td>'
            a+=  '<td id="date">'+data[i]["inf"][j]["date"]+'</td>'
            a+=  '<td id="time_in">'+data[i]["inf"][j]["time_in"]+'</td>'
            a+=  '<td id="time_out">'+data[i]["inf"][j]["time_out"]+'</td>'
            a+=  '<td id="status">'
            if(data[i]["inf"][j]["status"] == 1)
            {
              a+='<span class = "badge badge-warning"> Late </span>'
            }
            else
            {
              a+='<span class = "badge badge-primary"> Online </span>'
            }
            a+=  '</td>'
            a+=  '<td><button class="btn btn-success btn-sm edit" > <i class="fas fa-pencil-alt"></i>Edit</button> '
            a+=  ' <button class="btn btn-danger btn-sm delete" > <i class="fas fa-trash"></i>Delete</button></td>'
            a+=  '</td>'
            a+=  '</tr>'
          }
          a+= '</tr>'
        }
      return a;
  }
  function getData(name,date,i){
    $.ajax({
      type: "POST",
      url: "./attendance/getdata",
      data: {name:name, date:date, index:i},
      dataType: "json",
      success: function (data) {
        console.log(data)
        var a = loaddata(data["data"]);
         $("#tab-Attendance").html(a)
         var n = page(data,i)
         $("ul.pagination").html(n)
         if(((i-1)*5 + 5) > data["count"] )
         {
           end = data["count"]
         }
         else
         {
           end = ((i-1)*5 + 5)
         }
         var info = "Showing "+ ((i-1)*5 + 1) +" to "+end+" of "+data["count"]+" entries"
         $("#example1_info").html(info)
      
      }
    });
}
function pagenumber(data)
 {
  var total = data["count"];
  return Math.ceil(total/5);
 }
 $("#search").click(function()
  {
    name = $("#name").val();
    date = $("#date1").val();
    var index = ($("ul.pagination li.active").find("span").attr("data-dt-idx"));
    getData(name,date, index)
  })
  function page(response,index)
  {
       var n = pagenumber(response);
      a=  '<li class="paginate_button previous " id="example1_previous"> <span aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</span> </li>'
      for(var i = 1; i <= n; i++)
      {
        if(i == index)
        {
          a += '<li class="paginate_button page-item active">'
        }
        else
        {
          a += '<li class="paginate_button page-item">'
        }
      
       a += '<span aria-controls="example1" data-dt-idx="'+[i]+'" tabindex="0" class="page-link">'+[i]+'</span>'
       a += '</li>'
      }
      a +=  '<li class="paginate_button next" id="example1_next"><span aria-controls="example1" class="page-link">Next</span></li>'
      return a;
  }
  function pagenumber(data)
 {
  var total = data["count"];
  return Math.ceil(total/5);
 }
 $(document).on("click", "ul.pagination li.page-item", function(){
  { 
    var index = ($(this).find("span").attr("data-dt-idx"))
    name = $("#name").val();
    date = $("#date1").val();
    getData(name,date ,index)
    
    
  }
})
   </script>
   