<?php 
    /**
     * This page is dedicated to the registration of a new user:
     *  a user can register into the app by inseting some information (username, password, mail)
     *  at this point, the application check the information the user has inserted
     *      if the information are valid (no other user has the same username or the same mail), the user is register into the app
     *      otherwise the app displays a message to the user so he can visualise why the registration has failed (error, information...)
     */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>

  <!-- Google Font: Poppins -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <link rel="stylesheet" href="../build/tailwind.css"/>

  <script src="../js/registration.js"></script>
</head>
<body class="font-["Poppins",_sans-serif] bg-gradient-to-br from-custom-bg-start to-custom-bg-end min-h-screen flex flex-col items-center justify-center p-4 antialiased">
  <!-- 
    What's needed:
      - input text for the username
      - input password for the password
      - button for doing the registration

    Eventually there would be also some other objects in order to make the graphic better
  -->
  <div class="min-h-[calc(100vh-140px)] flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md bg-light-card dark:bg-dark-card rounded-card shadow-light dark:shadow-dark p-8 transition-all hover-lift">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold mb-2">Join the Adventure!</h1>
            <p class="text-light-text-secondary dark:text-dark-text-secondary">Create your account and start exploring</p>
        </div>
        
        <div class="space-y-2 mt-4">
            <label for="username" class="block text-sm font-medium">Username</label>
            <div class="relative">
                <input type="text" id="username" name="username" class="block w-full pl-10 pr-3 py-2 border border-light-border dark:border-dark-border rounded-input bg-light-bg dark:bg-dark-bg focus:ring-2 focus:ring-primary focus:border-primary transition-colors" placeholder="Choose a username" required>
            </div>
            <p class="text-xs text-light-text-secondary dark:text-dark-text-secondary hidden" id="username-feedback">Username must be at least 3 characters</p>
        </div>
        
        <div class="space-y-2 mt-4">
            <label for="password" class="block text-sm font-medium">Password</label>
            <div class="relative">
                <input type="password" id="password" name="password" class="block w-full pl-10 pr-3 py-2 border border-light-border dark:border-dark-border rounded-input bg-light-bg dark:bg-dark-bg focus:ring-2 focus:ring-primary focus:border-primary transition-colors" placeholder="Create a password" required>
            </div>
            <p class="text-xs text-light-text-secondary dark:text-dark-text-secondary hidden" id="password-feedback">Password must be at least 8 characters</p>
        </div>
        
        <button 
          onclick="Registration()"
          class="w-full py-2 px-4 mt-4 rounded-button bg-primary text-white hover:bg-primary-dark transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary relative overflow-hidden group">
            <span class="relative z-10">Create Account</span>
            <span class="absolute top-0 left-0 w-0 h-full bg-primary-dark transition-all duration-300 group-hover:w-full"></span>
        </button>
        
        <div class="mt-6 text-center">
            <p class="text-sm text-light-text-secondary dark:text-dark-text-secondary">
                Already have an account? 
                <a href="./login.php" class="text-primary hover:underline">Sign in</a>
            </p>
        </div>
      </div>
  </div>
</body>
</html>