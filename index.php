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
    <link rel="stylesheet" type="text/css" href="assets/css/style-index.css">
    <script src="assets/js/scripts.js"></script>
</head>
<body class="d-flex flex-column h-100">

<?php include_once "./classes/Report.php";
include_once "login.php";

$database = new Database();
$reports = $database->allReportes();
?>
<?php if (isset($_SESSION["user"]))
{
include_once "./layouts/header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h2>Reportes</h2>
            <?php
            if ($reports)
            {
                for ($i = 0; $i < sizeof($reports); $i ++)
                { ?>
                    <table style="border-radius: 2rem">
                        <tr>
                            <td class="td">
                                <ul style="padding: 2rem">
                                    <li><h3><a class="a1"
                                               href="reports.php?report=<?= $i ?>"><?php echo $reports[$i]->title ?></a>
                                        </h3>
                                    </li>
                                    <li><?php echo $reports[$i]->abstract ?></li>
                                    <br>
                                    <li><?php echo $reports[$i]->report_writer ?></li>
                                    <li><?php echo $reports[$i]->date ?></li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                    <br>
                <?php }
            }
            } ?>
        </div>
    </div>
</div>
</body>
</html>
