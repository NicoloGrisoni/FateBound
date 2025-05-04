<?php
    /**
     * This page is dedicated to the login of a user:
     *  a user, which has already register into the app, can access by inserting username and password
     *  at this point, the application check the information the user has inserted
     *      in case the information are valid (they correspond to a record saved in the database), the user get access to the app
     *      otherwise the app displays a message to the user so he can visualise why the access has not been done (error, information...)
     */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Google Font: Poppins -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <link rel="stylesheet" href="../build/tailwind.css"/>

  <script src="../js/login.js"></script>
</head>
<body>
  <!-- 
    What's needed:
      - input text for the username
      - input password for the password
      - button for doing the login operation

    Eventually there would be also some other objects in order to make the graphic better
  -->

  <label for="username">Username: </label>
  <input type="text" id="username"><br>

  <label for="password">Password: </label>
  <input type="text" id="password"><br>

  <button onclick="DoLogin()">Login</button>
</body>
</html>