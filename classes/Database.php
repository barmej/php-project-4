<?php
include_once "./classes/Report.php";

class Database {

    public $conn;

    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = "project_4";

        $this->conn = new mysqli($servername, $username, $password, $databasename);

        if ($this->conn->connect_error)
        {
            die("connection failed: " . $this->conn->connect_error);
        }
    }

    function login($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0)
        {
            return false;
        }

        return $result->fetch_array(MYSQLI_ASSOC);
    }

    function allReportes()
    {
        $stmt = $this->conn->prepare("SELECT * FROM reportes");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0)
        {
            return false;
        } else
        {
            $results = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC))
            {
                $results[] = new Report(
                    $row["title"], $row["abstract"], $row["report_writer"],
                    $row["date"], $row["text"]);
            }

            return $results;
        }
    }

    function createReport($report)
    {
        $stmt = $this->conn->prepare("INSERT INTO reportes
        (`user_id`,`title`,`abstract`,`report_writer`,`date`,`text`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $_SESSION["user_id"], $report->title, $report->abstract, $report->report_writer, $report->date, $report->text);

        return $stmt->execute();
    }
}


?>