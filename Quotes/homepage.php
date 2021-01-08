<div class="menu">
<?php include 'base.php';?>
</div>

<?php if(!isset($_SESSION["username"])){echo "access not permitted";exit;} ?>


<?php
  function logout() {
    session_destroy();
    header("Location: /Quotes/index.php");   
  }

  if (isset($_GET['logout'])) {
    logout();
  }
?>



  <div class="container">
    <h1>My Quotes</h1>
    
    <p>A Complete list of all the quotes you have added:</p>

    <?php
    
        $session_username = $_SESSION['username'];

        $sql     = "SELECT * FROM quotes WHERE user_id =(SELECT acc_id FROM users WHERE username = '$session_username')";
        $result  = $conn->query($sql);

        if ($result->num_rows> 0)
        {
          while($row = $result->fetch_assoc())
          {
            echo "<blockquote><p>" . $row['quote_text'] . "</p>";
            echo "<footer>" . $row['quote_source'] . "</footer></blockquote>";
          }
        }
    ?>
    
    <br>
    <a type="button" class="btn btn-primary btn-lg btn-block"  href="/Quotes/create_quote.php">Create Quote</a>

  </div>




<?footer();
  $conn->close();
?>
