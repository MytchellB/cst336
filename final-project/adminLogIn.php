<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="styles/styles.css" type="text/css" />
    </head>
    <body>

        <h1> Books - Admin Login </h1>
        
        <form method="POST" action="loginProcess.php">
          Username:  <input type="text" name="username"/> <br>
          Password:  <input type="password" name="password"/> <br>
          <input type="submit" class="btn btn-success" value="Login">
        </form>
        
        <a href="index.php">Go back to User Search</a>

    </body>
</html>