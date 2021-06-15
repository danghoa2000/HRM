<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("./Views/Admin/Layout/header.php");
    ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php
    include("./Views/Admin/Layout/topbar.php");
    include("./Views/Admin/Layout/slidebar.php");
    require($view);
  ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <?php
    include("./Views/Admin/Layout/footer.php")
  ?>
    </div>
</body>
</html>
