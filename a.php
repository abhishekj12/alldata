<?php
  include('connection.php');
 
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM data WHERE name LIKE '{$_POST['query']}%' LIMIT 7";
      $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
        echo $res['name']. "<br/>";
      }
    } else {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
           not found
      </div>
      ";
    }
  }
?>