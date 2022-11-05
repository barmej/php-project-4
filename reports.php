<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css">

    <script src="assets/vendors/jquery/jquery-3.4.1.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="assets/js/scripts.js"></script>
</head>

<body class="d-flex flex-column h-100">
<?php  
  include_once "./layouts/header.php";
  include_once "ReportInit.php";
?>
  <div class="container">
      <div class="row ">
           <div class="col-sm-10 ">
              <table class="table "> 
                <tr>
                  <td> 
                    <ul class="ul">
                       <li><h3><?php  echo $search->title ?></h3></li>
                        <br>
                        <li><?php echo $search->report_writer ?><li>
                        <li><?php echo $search->date ?></li>
                        <br>
                        <li> <?php echo $search->text ?></li>
                    </ul>
                  </td>
                </tr>
              </table>
            </div>
        </div>
      </div>
      <?php include_once "./layouts/footer.php";?>
  </body>
</html>