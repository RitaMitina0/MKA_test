<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Гостевая книга</title>
    <link rel="stylesheet" type="text/css" href="./assets/styles/main.css">
    <script type="text/javascript" src="./assets/scripts/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="./assets/scripts/send.js"></script>
  </head>
  <body>
    <?php 
    include "./assets/styles/comments.css";
    $host = "localhost";
    $db= "comments";
    $user = "root";
    $connect = new mysqli($host, $user,"", $db);
      if (!$connect) {
          echo "Не удалось подключиться к MySQL";
      }
    ?>
    <div class="wrapper">
      <main class="maincontent">
        <div class="container">
          <form class="form" action="./assets/scripts/dbConnect.php" method = "POST">
            <div class="form__content">
              <div class="form__blocks">
                <label class="form__item"><span>Имя  </span>
                  <input  id="user" type="text" name="user" required >
                </label>
                <label class="form__item"><span>Электронная почта  </span>
                  <input type="text" name="mail" >
                </label>
                <label class="form__item"><span>Текст сообщения</span>
                  <textarea type="text"  id="comment" name="comment" required></textarea>
                </label>
                <input class="send__btn" type="submit">
              </div>
            </div>
          </form>
          <div class="comments" id="comments">
            <?php 

            $query = $connect->query("SELECT * FROM user ORDER BY `name`,`date`");
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
        
            ?>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>