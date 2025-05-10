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
    rel="stylesheet" />

  <link rel="stylesheet" href="../build/tailwind.css" />

  <script src="../js/login.js"></script>
</head>
<body class="bg-neutral-100 font-body flex items-center justify-center min-h-screen">
    <!-- 
      What's needed:
        - input text for the username
        - input password for the password
        - button for doing the login operation

      Eventually there would be also some other objects in order to make the graphic better
    -->
    <div class="w-full max-w-md px-8 py-10 bg-white rounded-2xl shadow-md text-center">
      <h1 class="text-3xl font-heading text-neutral-900 mb-10">Accedi a FateBound</h1>

      <div class="text-left space-y-6">
        <div>
          <label for="username" class="block text-sm font-medium text-neutral-700 mb-1">Username</label>
          <input type="text" id="username" placeholder="Il tuo username"
                 class="w-full px-4 py-3 border border-neutral-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-600"/>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-neutral-700 mb-1">Password</label>
          <input type="password" id="password" placeholder="La tua password"
                 class="w-full px-4 py-3 border border-neutral-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-600"/>
        </div>
      </div>

      <button onclick="DoLogin()"
              class="px-4 py-2 text-neutral-700 hover:text-primary transition">
        Accedi
      </button>

      <p class="mt-6 text-sm text-neutral-600">
        Non hai un account? <a href="#" class="text-primary-600 hover:underline">Registrati</a>
      </p>
    </div>
  </body>
</html>