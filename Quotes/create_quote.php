<div class="menu">
<?php include 'base.php';?>
</div>

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
            <li class="active"><a href="/Quotes/homepage.php">Quotes</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="/Quotes/homepage.php?logout=true"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          </ul>
        </div>
      </nav>




  <div class="container">
    <h1>Blockquotes</h1>
    <p>The blockquote element is used to present content from another source:</p>

  <form method="POST" action="create_quote.php">
    <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" id="comment"  placeholder="Enter quote"name="comment"></textarea>
    </div>

    <div class="form-group">
      <label for="username">Source:</label>
      <input type="text" class="form-control" id="source" placeholder="Enter source" name="source" required>
    </div>
    <br>
    <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
  </form>


  </div>



<?php
  $session_username = $_SESSION['username'];
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    
    $quote = $_POST['comment'];
    $source = $_POST['source'];

    $sql     = "SELECT acc_id FROM users WHERE username ='$session_username'";
    $result  = $conn->query($sql);
    $content = $result->fetch_assoc();

    $user_id = $content['acc_id'];

    // echo $quote;
    // echo $source;
    // echo $user_id;

    $sql = "INSERT INTO quotes (quote_text,quote_source,user_id) VALUES ('$quote','$source','$user_id')";
    
    if ($conn->query($sql) === true)
      {
        header("Location: /Quotes/homepage.php");
      }
    else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }


  footer();

?>
