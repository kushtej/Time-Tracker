<div class="menu">
<?php include 'base.php';?>
</div>



<div class="container">
  <h2> SIGNUP PAGE :</h2>
  <form method="POST" action="signup.php">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
    <div class="form-group">
      <label for="pwd">Retype Password:</label>
      <input type="password" class="form-control" id="pwd1" placeholder="Enter password" name="pwd1" required>
    </div>

    <div class="form-group" >
      <label for="sq">Security Question:</label>
    <div class="dropdown">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      Answer any one of the following sequrity question..
    </button>
    <div class="dropdown-menu dropdown-menu">
      <a id="sq-1" class="dropdown-item" href="#">Name of the artist of your favorite song?</a><br>
      <a id="sq-2" class="dropdown-item" href="#">What was your favorite elementary school teacher’s name? </a><br>
      <a id="sq-3" class="dropdown-item" href="#">What is your car’s license plate number?</a><br>
    </div>
    <br><br>
    <input type="text" class="form-control" id="sa-1" placeholder="Name of the artist of your favorite song?" name="sa-1">
    <input type="text" class="form-control" id="sa-2" placeholder="What was your favorite elementary school teacher’s name?" name="sa-2" >
    <input type="text" class="form-control" id="sa-3" placeholder="What is your car’s license plate number?" name="sa-3">

  </div>
  </div>
    <br><br><br>
    <input  type="submit" name="submit" class="btn btn-default">
  </form>
</div>

<script>
      $("#sa-1,#sa-2,#sa-3").hide();
      
      //sa-1
      $("#sq-1").click (function(){
      $("#sa-1").show();


      $("#sa-2,#sa-3").hide();
      });

      //sa-2
      $("#sq-2").click (function(){
      $("#sa-2").show();
      $("#sa-1,#sa-3").hide();
      });

      //sa-3
      $("#sq-3").click (function(){
      $("#sa-3").show();
      $("#sa-1,#sa-2").hide();
      });

      </script>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $username  = $_POST['username'];
    $password  = $_POST['pwd'];
    $password1 = $_POST['pwd1'];

    if("" != trim($_POST['sa-1']))
    {
        $sq="Name of the artist of your favorite song?";
        $sa=$_POST['sa-1'];
    }
    else if("" != trim($_POST['sa-2']))
    {
      $sq="What was your favorite elementary school teacher’s name?";
      $sa=$_POST['sa-2'];
    }
    else if("" != trim($_POST['sa-3'])) 
    {
      $sq="What is your car’s license plate number?";
      $sa=$_POST['sa-3'];
    }
    else
    {
      echo "<center style='color:red;'>Select Security Question..</center>";
      exit();
    }

    
    if ($password != $password1)
      {
        echo "<center>Passwords do not match!";
      }
    else
      {
        $sql = "INSERT INTO users (username, password, security_question, security_answer) VALUES ('$username','$password','$sq','$sa')";
        
        if ($conn->query($sql) === true)
          {
            $_SESSION["username"] = $username;
            header("Location: /Quotes/homepage.php");
          }
        else
          {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<center style='color:red;'>Username already used! Try another username</center>";
          }
      }
  }
  footer();
  $conn->close();

?>


