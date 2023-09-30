<?php
?>

<html>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>
        Upload archive containing Pebble watch database
    </h1>
    <?php
        echo Form::open(array('url' => '/uploadarchive', 'method' => 'POST', 'files' => 'true'));
        echo Form::file('pebble_diag_dump');
        echo Form::submit('Upload File');
        echo Form::close();
    ?>
</body>

</html>