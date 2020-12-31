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


<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-base">
            <a class="navbar-brand" href="/Quotes/index.php">Project</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="/Quotes/index.php">Quotes</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/Quotes/homepage.php?logout=true"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          </ul>
        </div>
      </nav>

      


  <div class="container">
    <h1>Blockquotes</h1>
    
    <p>The blockquote element is used to present content from another source:</p>

    <?php
    //print_r($_SESSION);

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




<?footer();?>
