  <?php
  if(isset($_SESSION["role"]))
  {
    if( $_SESSION["role"] == "user")
    {
        $data_staff= $this->EmployeeModel->findByID($_SESSION["id"]);
    }
    else
    {
      $data_staff = $this->LoginModel->signin($_SESSION["id"], $_SESSION["pass"]);
    }
  }
  ?>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AdminLTE 3 | Dashboard 2</title>
  <base href="http://localhost/HRM/">
  
  <link rel="stylesheet" href="./Public/Interface/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="./Public/Interface/plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="./Public/Interface/plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="./Public/Interface/plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="./Public/Interface/plugins/fullcalendar-bootstrap/main.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./Public/Interface/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="./Public/Css/Css.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Ionicons -->
  <!-- daterange picker -->
  <link rel="stylesheet" href="./Public/Interface/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="./Public/Interface/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="./Public/Interface/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="./Public/Interface/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="./Public/Interface/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="./Public/Interface/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="./Public/Interface/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./Public/Interface/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="./Public/Interface/plugins/jquery/jquery.min.js"></script>

  