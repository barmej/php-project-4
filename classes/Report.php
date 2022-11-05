<?php

class Report {

    public $title;
    public $abstract;
    public $report_writer;
    public $date;
    public $text;

    function __construct($title, $abstract, $report_writer, $date, $text)
    {
        $this->title = $title;
        $this->abstract = $abstract;
        $this->report_writer = $report_writer;
        $this->date = $date;
        $this->text = $text;
    }

    function __toString()
    {
        $result = "{$this->title} <br>";
        $result .= "{$this->abstract} <br>";
        $result .= "{$this->report_writer} <br>";
        $result .= "{$this->date} <br>";
        $result .= "{$this->text} <br>";

        return $result;
    }
}


?>