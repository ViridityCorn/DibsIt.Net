<?php

// INIT
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "2a-config.php";
require PATH_LIB . "2b-lib-res.php";
$reslib = new Res();



if ($_POST['req']) { switch ($_POST['req']) {

  default :
    echo json_encode([
      "status" => 0,
      "message" => "Invalid request"
    ]);
    break;


  case "show-cal":

    $thisMonth = (is_numeric($_POST['month']) && $_POST['month']>=1 && $_POST['month']<=12) ? $_POST['month'] : date("n");
    $thisYear = is_numeric($_POST['year']) ? $_POST['year'] : date("Y");
    $thisStart = strtotime(sprintf("%s-%02u-01", $thisYear, $thisMonth));
    $daysInMonth = date("t", $thisStart);
    $thisEnd = strtotime(sprintf("%s-%02u-%s", $thisYear, $thisMonth, $daysInMonth));
    $startDay = date("N", $thisStart);
    $endDay = date("N", $thisEnd);
    $yearNow = date("Y");
    $monthNow = date("n");
    $dayNow = date("j");


    $squares = [];

    $inow = 1;
    if ($thisYear==$yearNow && $thisMonth==$monthNow) {
      for ($inow=1; $inow<=$dayNow; $inow++) {
        $squares[] = ["d"=>$inow, "b"=>1];
      }
    }

    // Populate the rest of the selectable days
    for ($inow=2; $inow<=$daysInMonth; $inow++) {
      $squares[] = ["d"=>$inow, "b"=>1];
    }
    for ($inow=3; $inow<=$daysInMonth; $inow++) {
      $squares[] = ["d"=>$inow, "b"=>3];
    }
    for ($inow=4; $inow<=$daysInMonth; $inow++) {
      $squares[] = ["d"=>$inow, "b"=>4];
    }
    for ($inow=5; $inow<=$daysInMonth; $inow++) {
      $squares[] = ["d"=>$inow, "b"=>5];
    }
    for ($inow=6; $inow<=$daysInMonth; $inow++) {
      $squares[] = ["d"=>$inow, "b"=>6];
    }
    for ($inow=7; $inow<=$daysInMonth; $inow++) {
      $squares[] = ["d"=>$inow, "b"=>7];
    }
    // If the last day of the month is not Saturday, pad with blanks
    if ($endDay != 6) {
      $blanks = $endDay==7 ? 6 : 6-$endDay;
      for ($i=0; $i<$blanks; $i++) {
        $squares[] = ["b"=>1];
      }
    }

    // Draw calendar - Limit your selectable periods here if you want
    // Month selector
    $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Ot", "Nov", "Dec"];
    echo "<select class='month'>";
    // Does not allow months that have already passed this year
    for ($i=($yearNow==$thisYear ? $monthNow : 1); $i<=12; $i++) {
      printf("<option value='%02u'%s>%s</option>", 
        $i, $i==$thisMonth?" selected":"", $months[$i-1]
      );
    }
    echo "</select>";

    // Year selector
    echo "<select class='year'>";
    // Set to max 3 years from now - change it if you want
    for ($i=$yearNow; $i<=$yearNow+3; $i++) {
      printf("<option value='%s'%s>%s</option>", 
        $i, $i==$thisYear?" selected":"", $i
      );
    }
    echo "</select>";

    // Dates
    echo "<table><tr class='days'>";

    // First row - Days of week
    $days = ["Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat"];
    foreach ($days as $d) { echo "<td>$d</td>"; }
    echo "</tr><tr>";

    // Following rows - Days in month
    $total = count($squares);
    $first = true;
    for ($i=0; $i<$total; $i++) {
      echo "<td class='";
      if ($squares[$i]['b']) {
        echo "blank";
      } else if ($first) {
        echo "active";
        $first = false;
      } else {
        echo "pick";
      }
      echo "'>";
      if ($squares[$i]['d']) { echo $squares[$i]['d']; }
      echo "</td>";
      if ($i!=0 && ($i+1)%7==0) {
        echo "</tr><tr>";
      }
    }
    echo "</tr></table>";
    break;

  // SHOW TIME SLOT SELECTOR
  case "show-slot":

    $selected = date("N", strtotime($_POST['date']));
    $weekend = $selected==6 || $selected==7;
    if ($weekend);
    else   ?>
    <select>
      <option value="AM">AM</option>>
      <option value="PM">PM</option>>
    </select>
  <?php break;

  // ADD NEW RESERVATION - WHOLE DAY BOOKING
  case "book-day":
    // Save reservation to database
    $pass = $reslib->bookDay(
      $_POST['name'], $_POST['email'], $_POST['tel'], $_POST['date'], 
      $_POST['notes'] ? $_POST['notes'] : ""
    );

    
    if ($pass) {
      $message = "";
      foreach ($_POST as $k=>$v) {
        $message .= $k . " - " . $v;
      }
      @mail("admin@yoursite.com", "Reservation receieved", $message);
    }
    

    // Server response
    echo json_encode([
      "status" => $pass ? 1 : 0,
      "message" => $pass ? "OK" : $reslib->error
    ]);
    break;

  // ADD NEW RESERVATION - TIME SLOT BOOKING
  case "book-slot":
    // Save reservation to database
    $pass = $reslib->bookSlot(
      $_POST['name'], $_POST['email'], $_POST['tel'], $_POST['date'], $_POST['slot'],
      $_POST['notes'] ? $_POST['notes'] : ""
    );
    /* You can send an email if you want
    if ($pass) {
      $message = "";
      foreach ($_POST as $k=>$v) {
        $message .= $k . " - " . $v;
      }
      @mail("admin@yoursite.com", "Reservation receieved", $message);
    }
    */
    // Server response
    echo json_encode([
      "status" => $pass ? 1 : 0,
      "message" => $pass ? "OK" : $reslib->error
    ]);
    break;

  // ADD NEW RESERVATION - DATE RANGE BOOKING
  case "book-range":
    // Save reservation to database
    $pass = $reslib->bookRange(
      $_POST['name'], $_POST['email'], $_POST['tel'], $_POST['start'], $_POST['end'],
      $_POST['notes'] ? $_POST['notes'] : ""
    );
    
    /* You can send an email if you want
    if ($pass) {
      $message = "";
      foreach ($_POST as $k=>$v) {
        $message .= $k . " - " . $v;
      }
      @mail("admin@yoursite.com", "Reservation receieved", $message);
    }
    */
    
    // Server response
    echo json_encode([
      "status" => $pass ? 1 : 0,
      "message" => $pass ? "OK" : $reslib->error
    ]);
    break;
}}
