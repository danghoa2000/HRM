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
              <li class="breadcrumb-item active">employee</li>
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
              <a class="btn btn-primary" href="./employee/add/"><i class="fas fa-plus"> New</i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6">
                <div id="example1_filter" class="dataTables_filter" style="float: right;"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1" id="search"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Level</th>
                <th>Status</th>
                <th>Create On</th>
                <th>Tool</th>
                </tr>
                </thead>
                <tbody id="tab">
               </tbody>
                <tfoot>
                <tr>
                </tfoot>
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

</div>
<script>
  function loaddata(data)
  {
    var a = "";
        for(var i = 0; i<data["data"].length; i++)
        {
          var status, type, gender,color;
          if(data["data"][i]["gender"]==1)
          {
            gender = "Male"
            color = "badge bg-info"
          }
          else
          {
            gender = "Female"
            color = "badge bg-maroon"
          }
          if(data["data"][i]["status"] == 1)
          {
            status = "Working";
            type = "badge bg-success"
          }
          else
          {
            status = "Quit Job";
            type = "badge bg-danger"
          }
          a+= '<tr>'
          a+=  '<td class="id" id="id_employee">'+data["data"][i]["id_employee"] +'</td>'
          a+= '<td class="avatar" id="avatar_employee"><img src="./Views/Admin/Employee/Upload/'+data["data"][i]["avatar"] +'" alt=""></td>'
          a+=  '<td class="name" id="name_employee">'+data["data"][i]["name"] +'</td>'
          a+= ' <td class="gender" id="gender_employee"> <span class="'+color+'">'+gender +'<input id="gender" type="hidden" value="'+data["data"][i]["gender"]+'"></span></td>'
          a+=  '<td class="email" id="email_employee">'+data["data"][i]["email"] +'</td>'
          a+=  '<td class="phone" id="phone_employee">'+data["data"][i]["phone"] +'</td>'
          a+=  '<td class="address" id="address_employee">'+data["data"][i]["address"] +'</td>'
          a+= '<td class="level" id="level_employee">'+data["data"][i]["id_level"] +'</td>'
          a+=  '<td class="status" id="status_employee"><span class="'+type+'">'+ status +'<input id="status" type="hidden" value="'+data["data"][i]["status"]+'"> </span></td>'
          a+=  '<td class="create" id="create_employee">'+data["data"][i]["create_on"] +'</td>'
          a+=  '<td>'
          a+=  '<button class="btn btn-primary btn-block btn-sm view" ><i class="fas fa-eye"></i></button> <button class="btn btn-danger btn-block btn-sm delete"><i class="fas fa-trash-alt"></i></button>'
          a+= ' </td>'
          a+= '</tr>'
        }
      return a;
  }

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
  function getData(name, index,i){
   var url, data
   if(!i)
   {
     i = 1;
   }
   if(name =="")
   {
    url = "./employee/show"
    data = {index:index};
   }
   else{
     url = "./employee/search"
     data = {name:name, index:index}
   }
  $.ajax({
      type: "POST",
      url: url,
      data: data,
      dataType: "json",
      success: function (data) {
        console.log(data)
        var a = loaddata(data);
         $("#tab").html(a)
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
     
  })
}

  $(document).ready(function()
  {
    getData(name)
  })
  $("#search").keyup(function()
  {
    var index = ($(this).find("span").attr("data-dt-idx"));
    getData($(this).val(), index);
  })
  $(document).on("click", ".view", function(){
    var id = $(this).parents("tr").find("td:nth-child(1)").text();
    location.href = "./employee/detail/"+id
  })
  $(document).on("click", ".delete", function(){
  {
  var type = "";
  if($(this).parents("tr").find("#status").val() == 1)
  {
    type = 2;
  }
  else
  {
    type = 1;
  }
  var id = $(this).parents("tr").find("td:nth-child(1)").text();
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "./employee/delete",
        data:{id:id, type:type},
        dataType: "json",
        success: function (response) {
          if(response == true)
          {
            Swal.fire(
              'Success!',
              'Save change ',
              'success'
            ).then((result) =>{
             location.reload()
  
            })
          }
        }
      });
    }
  })
}
}); 
 function pagenumber(data)
 {
  var total = data["count"];
  return Math.ceil(total/5);
 }
 $(document).on("click", "ul.pagination li.page-item", function(){
  { 
    var index = ($(this).find("span").attr("data-dt-idx"))
    name = $("#search").val();
    getData(name,index ,index)
    
  }
})
$(document).on("click", "ul.pagination li#example1_next", function(){
  { 
    span = $("ul.pagination").find(".active")
    current = span.find("span").attr("data-dt-idx")
    index = parseInt(current)+1
    if(index > $("ul.pagination li.page-item").length)
    {
      index = $("ul.pagination li.page-item").length
        
    }
    name = $("#search").val();
    getData(name,index,index)
    
  }
})

$(document).on("click", "ul.pagination li#example1_previous", function(){
  { 
    span = $("ul.pagination").find(".active")
    current = span.find("span").attr("data-dt-idx")
    index = parseInt(current)-1
    if(index < 1)
    {
      index = 1
    }
    console.log(index)
    name = $("#search").val();
    getData(name,index,index)
    
  }
})
</script>