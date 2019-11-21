<?php
class Res {
  /* [DATABASE HELPER FUNCTIONS] */
  protected $pdo = null;
  protected $stmt = null;
  public $error = "";
  public $lastID = null;

  function __construct() {
  // __construct() : connect to the database
  // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD

    // ATTEMPT CONNECT
    try {
      $str = "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET;
      if (defined('DB_NAME')) { $str .= ";dbname=" . DB_NAME; }
      $this->pdo = new PDO(
        $str, DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false
        ]
      );
      return true;
    }

    // ERROR - DO SOMETHING HERE
    // THROW ERROR MESSAGE OR SOMETHING
    catch (Exception $ex) {
      print_r($ex);
      die();
    }
  }

  function __destruct() {
  // __destruct() : close connection when done

    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

  function exec($sql, $data=null) {
  // exec() : run insert, replace, update, delete query
  // PARAM $sql : SQL query
  //       $data : array of data
 
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
      $this->lastID = $this->pdo->lastInsertId();
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return true;
  }

  function fetch($sql, $cond=null, $key=null, $value=null) {
  // fetch() : perform select query
  // PARAM $sql : SQL query
  //       $cond : array of conditions
  //       $key : sort in this $key=>data order, optional
  //       $value : $key must be provided, sort in $key=>$value order

    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      if (isset($key)) {
        $result = array();
        if (isset($value)) {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row[$value];
          }
        } else {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row;
          }
        }
      } else {
        $result = $this->stmt->fetchAll();
      }
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return $result;
  }

  function bookDay ($name, $email, $tel, $date, $notes="") {

    $sql = "SELECT * FROM `reservations` WHERE `res_email`=? AND `res_date`=?";
    $cond = [$email, $date];
    $check = $this->fetch($sql, $cond);
    if (count($check)>0) {
      $this->error = $email . " has already reserved " . $date;
      return false;
    }


    $sql = "INSERT INTO `reservations` (`res_name`, `res_email`, `res_tel`, `res_notes`, `res_date`) VALUES (?,?,?,?,?)";
    $cond = [$name, $email, $tel, $notes, $date];
    return $this->exec($sql, $cond);
  }

  function bookSlot ($name, $email, $tel, $date, $slot, $notes="") {

    $sql = "SELECT * FROM `reservations` WHERE `res_email`=? AND `res_date`=? AND `res_slot`=?";
    $cond = [$email, $date, $slot];
    $check = $this->fetch($sql, $cond);
    if (count($check)>0) {
      $this->error = $email . " has already reserved " . $date . " " . $slot;
      return false;
    }


    $sql = "INSERT INTO `reservations` (`res_name`, `res_email`, `res_tel`, `res_notes`, `res_date`, `res_slot`) VALUES (?,?,?,?,?,?)";
    $cond = [$name, $email, $tel, $notes, $date, $slot];
    return $this->exec($sql, $cond);
  }

  
  function bookRange ($name, $email, $tel, $start, $end, $notes="") {

    $sql = "SELECT * FROM `reservations` WHERE (`res_start` BETWEEN ? AND ?) OR (`res_end` BETWEEN ? AND ?)";
    $cond = [$start, $end, $start, $end];
    $check = $this->fetch($sql, $cond);
    if (count($check)>0) {
      $this->error = $email . " has already reserved between " . $start . " and " . $end;
      return false;
    }


    $sql = "INSERT INTO `reservations` (`res_name`, `res_email`, `res_tel`, `res_notes`, `res_start`, `res_end`) VALUES (?,?,?,?,?,?)";
    $cond = [$name, $email, $tel, $notes, $start, $end];
    return $this->exec($sql, $cond);
  }

  function bookGet ($start, $end) {

    $search = $this->fetch(
      "SELECT * FROM `reservations` WHERE `res_date` BETWEEN ? AND ?",
      [$start, $end]
    );
    return count($search)==0 ? false : $search ;
  }
}
?>