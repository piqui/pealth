<?php
    use App\Models\Classifier;
    use Illuminate\Http\Request;
    use App\Models\ActivitySessions;
?>

<html>
    <head>
        <title>Testing</title>
    </head>
    <body>
        <?php
            $healthData = new Classifier(
                $date = new DateTime($_GET['Date_and_time'] ?? '2023-03-20 00:00:00')); // If user calls page without date-time, use this default date-time
        ?>
        </br>
<?php
    $activitySessions = ActivitySessions::where('_id', 10)
        ->select('start_utc_secs', 'step_count')
        ->get();
    echo $activitySessions;

    $activitySessions = ActivitySessions::wherebetween('start_utc_secs', ['1514768461', '1519866061'])
        ->select('start_utc_secs', 'step_count')
        ->get();
    echo $activitySessions;

    echo '<br/><br/>';
    $activitySessions = ActivitySessions::wherebetween('start_utc_secs', ['2018-01-01 01:01:01', '2018-03-01 01:01:01'])
        ->select('start_utc_secs', 'step_count')
        ->get();
    echo $activitySessions;

?>
    </body>
</html>
