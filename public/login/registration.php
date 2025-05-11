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
  <main class="flex flex-col items-center justify-center flex-grow w-full max-w-md mx-auto">
    <div class="mb-8 sm:mb-10 text-center">
      <a href="../index.html" class="text-3xl sm:text-4xl font-bold text-gray-900">FateBound</a>
    </div>

    <div class="bg-white w-full rounded-xl shadow-2xl p-6 sm:p-8 md:p-10">
      <h2 class="text-2xl sm:text-3xl font-bold text-center text-gray-900 mb-3 sm:mb-4">Crea il tuo Account</h2>
      <p class="text-center text-gray-600 mb-6 sm:mb-8 text-sm sm:text-base">Unisciti a noi per iniziare la tua avventura.</p>

      <div class="space-y-4 sm:space-y-5">
        <div>
          <label for="username" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-1.5">Username: </label>
          <input type="text" id="username" placeholder="Scegli il tuo username"
            class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom-purple-accent focus:border-custom-purple-accent outline-none transition-colors placeholder-gray-400 text-sm" />
        </div>

        <div>
          <label for="password" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-1.5">Password: </label>
          <!-- Nota: l'utente ha fornito type="text" per la password, solitamente è type="password" -->
          <input type="text" id="password" placeholder="Crea una password sicura"
            class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom-purple-accent focus:border-custom-purple-accent outline-none transition-colors placeholder-gray-400 text-sm" />
        </div>
        
        <!-- Potrebbe essere utile aggiungere un campo "Conferma Password" qui -->

        <button onclick="Registration()"
          class="w-full bg-custom-purple-accent hover:bg-opacity-90 text-white rounded-lg py-2.5 sm:py-3 text-sm sm:text-base font-semibold transition-colors shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-custom-purple-accent focus:ring-offset-2">
          Registration
        </button>
      </div>

      <p class="mt-6 sm:mt-8 text-center text-xs sm:text-sm text-gray-600">
        Hai già un account? <a href="./login.php" class="font-medium text-custom-purple-accent hover:underline">Accedi ora</a>
      </p>
    </div>
  </main>
  
  <footer class="w-full py-6 sm:py-8 text-center text-xs sm:text-sm text-gray-500">
    &copy; 2025 FateBound. Tutti i diritti riservati.
  </footer>
</body>
</html>