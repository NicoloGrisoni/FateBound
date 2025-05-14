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
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - FateBound</title>

  <!-- Google Font: Poppins (coerente con la homepage) -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="../build/tailwind.css" />

  <script src="../js/login.js"></script>
</head>
<body class="font-["Poppins",_sans-serif] bg-gradient-to-br from-custom-bg-start to-custom-bg-end min-h-screen flex flex-col items-center justify-center p-4 antialiased">
  <!-- 
    What's needed:
      - input text for the username
      - input password for the password
      - button for doing the login operation

    Eventually there would be also some other objects in order to make the graphic better
  -->
  <div class="min-h-[calc(100vh-140px)] flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md bg-light-card dark:bg-dark-card rounded-card shadow-light dark:shadow-dark p-8 transition-all hover-lift">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold mb-2">Welcome Back, Adventurer!</h1>
            <p class="text-light-text-secondary dark:text-dark-text-secondary">Sign in to continue your epic journey</p>
        </div>
        
        <div class="space-y-2">
            <label for="username" class="block text-sm font-medium">Username</label>
            <div class="relative">
                <input type="text" id="username" name="username" class="block w-full pl-10 pr-3 py-2 border border-light-border dark:border-dark-border rounded-input bg-light-bg dark:bg-dark-bg focus:ring-2 focus:ring-primary focus:border-primary transition-colors" placeholder="Enter your username" required>
            </div>
        </div>
        
        <div class="space-y-2 mt-4">
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium">Password</label>
                <a href="#" class="text-sm text-primary hover:underline">Forgot password?</a>
            </div>
            <div class="relative">
                <input type="password" id="password" name="password" class="block w-full pl-10 pr-3 py-2 border border-light-border dark:border-dark-border rounded-input bg-light-bg dark:bg-dark-bg focus:ring-2 focus:ring-primary focus:border-primary transition-colors" placeholder="Enter your password" required>
            </div>
        </div>
        
        <button 
          onclick="DoLogin()"
          class="w-full py-2 px-4 mt-4 rounded-button bg-primary text-white hover:bg-primary-dark transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary relative overflow-hidden group">
            <span class="relative z-10">Sign in</span>
            <span class="absolute top-0 left-0 w-0 h-full bg-primary-dark transition-all duration-300 group-hover:w-full"></span>
        </button>
        
        <div class="mt-6 text-center">
            <p class="text-sm text-light-text-secondary dark:text-dark-text-secondary">
                Don't have an account? 
                <a href="./registration.php" class="text-primary hover:underline">Register now</a>
            </p>
        </div>
      </div>
  </div>
</body>
</html>