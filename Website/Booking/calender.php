<?php
error_reporting(E_ALL);
ini_set('display_erroes',1);
class Calender{
 private $month;
 private $year;
 private $days_of_week;
 private $num_days;
 private $date_info;
 private $day_of_week;

public function __construct($month, $year, $days_of_week= array('mandag','tirsdag','onsdag','torsdag','fredag','lørdag','søndag') );

?>