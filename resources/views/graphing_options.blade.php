<?php
    use Carbon\Carbon;
?>
 <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
<div>
    Please input a start and end time
    <?php
    
        $date = new DateTime($_GET['date_and_time'] ?? NULL); // If nothing is passed the current time is used
        // TODO: grab datetime from compact
        // Create a form that asks for a date and time for graphing data
        echo Form::open(array('url' => '/graphing', 'method' => 'POST'));
        echo Form::text('start_date', Carbon::create('last year')->format('Y-m-d H:i:s'));
        echo Form::text('end_date', $date->format('Y-m-d H:i:s'));
        echo Form::submit('Submit');
        echo "</br>";
    ?>
</div>
