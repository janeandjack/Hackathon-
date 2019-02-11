<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <?php session_start(); // place it on the top of the script ?>
    <?php
    $statusMsg = !empty($_SESSION['msg'])?$_SESSION['msg']:'';
    unset($_SESSION['msg']);
    echo $statusMsg;
    ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1 class="text-primary">Hello, world!</h1>

    <form action="Admin/sign-up.php" method="POST" class="px-4 py-3">
      <div class="form-group">
        <label for="first_name">First Name: 
          <input type="text" name="first_name" id="first_name" required>
      </label>
      </div>
      <div class="form-group">
        <label for="last_name">Last Name: 
          <input type="text" name="last_name" id="last_name" required>
      </label>
      </div>
      <div class="form-group">
        <label for="email">Email: 
          <input type="email" name="email" id="email" required>
      </label>
      </div>
      <div class="form-group">
        <label for="country">Country: 
          <input type="text" name="country" id="country" required>
      </div>
    </label>
      <button type="submit" name="submit" class="btn btn-primary">SUBSCRIBE</button>
  </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>