<html>
<head>   
<link href="calendar.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
//Include lader en ligge andre dokumenter in i index så det arbejder sammen.
include ('1-reserve.sql');
include ('2c-ajax-reserve.php');
include ('calendar.php');
$calendar = new Calendar();
 
echo $calendar->show();
?>
</body>
</html> 