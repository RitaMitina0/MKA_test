<?php 
  $host = "localhost";
  $db= "comments";
  $user = "root";
  $connect = new mysqli($host, $user,"", $db);

    $client     = $_POST['name'];
    $comment    = $_POST['msg'];

    $stmt =  $connect->prepare('insert into `user`(`name`, `msg`, `date`) values ( ?, ?, NOW())');
    $stmt->bind_param('ss', $client, $comment);

   if( $stmt->execute()) {
    $query = $connect->query("SELECT * FROM user ORDER BY name,date");
    while($row = $query->fetch_assoc()) {
      echo '<div class = "comments__block">';
        echo'<div class = "comments__header">';
          echo '<span class = "name">';
          print $row["name"];
          echo '</span>';
          echo '<span class = "date">';
          print $row["date"];
          echo '</span>';
        echo '</div>';
        echo '<div class = "comments__text">';
          print $row["msg"];
        echo '</div>';
        echo '</div>';
        
    }
    print '</div>';
    }

      $stmt->fetch();
      $stmt->close();
  
   
?>