<?php 
session_start();

require($_SERVER['DOCUMENT_ROOT'].'/tastyrecipes/classes/Controller/controller.php');
use ContrHandler\Controller as mesContr;
?>     
       <div class="comments--wrapper">
        <h2>Comment section - Give your feedback!</h2>
        <?php
          echo"<form method='POST' action='#comments'>
            <input type='hidden' name='uid' value='".$_SESSION['uid']."'>
            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
            <textarea name='message'></textarea>
            <input type='submit' name='commentSubmit'>
          </form>";
        ?>
        <?php
        $contr = new mesContr();
        if(isset($_POST['commentSubmit'])) {
          if($_SESSION['uid']) {
              $uid = $_POST['uid'];
              $date = $_POST['date'];
              $message = $_POST['message'];
              if(ctype_print($message)){
                $contr->setComments($recipesite, $uid, $date, $message);
              }else{
                echo "Your comment can only contain letters and digits";
              }
          } else{
              echo "please log in to comment";
            }
        }
          $result = $contr->getComments($recipesite);
          echo "<ul class='comments-list' id='comments'>";
            foreach ($result as $row){
              echo "<div class='comment'>";
              if($recipesite == $row['site']){
              echo '<h5>'.$row['uid'].'</h5>';
              echo '<p class="date">'.$row['date'].'</p>';
              echo '<p>'.$row['message'].'</p>';
                if($_SESSION['uid'] == $row['uid']) {
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='cid' value='".$row['cid']."' />";
                echo "<input type='submit' value='delete' name='delSub'/>";
                echo "</form>";
                }
              echo "</div>";
              }
            }
            echo "</ul>";
            if(isset($_POST['delSub'])){
              $cId = $_POST['cid'];
              $delresult = $contr->delComments($cId);
              if($delresult == TRUE){
                echo "Comment deleted successfully";
              }else{
                echo "We had a problem deleting your comment";
              }
            }
          ?>
         </div>