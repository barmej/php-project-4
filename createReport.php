<?php session_start() ?>
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

    <link rel="stylesheet" type="text/css" href="assets/css/creatReport.css">

    <script src="assets/js/scripts.js"></script>
</head>
<?php
include_once "./layouts/header.php";
include_once "ReportInit.php";
if (isset($_POST["title"]))
{
    $report = new Report($_POST["title"], $_POST["abstract"], $_SESSION["user"], $_POST["date"], $_POST["text"]);
    $is_created = $database->createReport($report);
    if ($is_created){
        header("Location:index.php");
    }
}
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto bg">
            <div class="w-50 mx-auto">
                <form method="POST" action="createReport.php">
                    <p><?php echo isset($message) ? $message : "" ?></p>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control text-direction" id="title"
                               aria-describedby="titleHelp" placeholder="title">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Abstract</label>
                            <textarea name="abstract" class="form-control" id="exampleFormControlTextarea1"
                                      placeholder="abstract" rows="3"></textarea>
                        </div>

                        <label for="date">Date</label>
                        <input name="date" type="text" class="form-control text-direction" id="date"
                               aria-describedby="dateHelp" placeholder="date">

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Report</label>
                            <textarea name="text" class="form-control" id="exampleFormControlTextarea1"
                                      placeholder="text" rows="3"></textarea>
                        </div>
                        <input type="submit" class="btn btn-outline-dark btn-md btn-block" value="Add Report"/>
                </form>
            </div>
            <br>
            <?php include_once "./layouts/footer.php"; ?>
        </div>
    </div>
</div>

</body>
</html>