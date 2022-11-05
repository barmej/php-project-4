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

    <link rel="stylesheet" type="text/css" href="assets/css/login.css">

    <script src="assets/js/scripts.js"></script>

</head>
<?php
include_once "./classes/Database.php";
$database = new Database();
if (isset($_POST["email"]))
{
    $result = $database->login($_POST["email"], $_POST["password"]);
    if ($result)
    {
        $message = $result;
        $_SESSION["user"] = $message["user"];
        $_SESSION["user_id"] = $message["id"];
    } else
    {
        $message = "The password you’ve entered is incorrect";
    }
}
?>
<body>
<?php if (!isset($_SESSION["user"])){ ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto bg">
            <form class="w-75 p-3  mx-auto" action='index.php' method='POST'>

                <div h2 class="h2">
                    <label for="text" class="form-label "> Sign in</label>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPasswordl1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="password">
                </div>
                <?php if (isset($message))
                {
                    if ($message == "The password you’ve entered is incorrect")
                    {
                        echo $message;
                    }
                } ?>
                <div class="mb-3 ">
                    <button type="submit" class="btn btn-outline-dark" href="index.php">Login</button>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>
