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
<html lang="it" class="scroll-smooth font-sans">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FateBound - Login</title>

  <!-- Google Font: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <!-- Tailwind CSS -->
  <link rel="stylesheet" href="../build/tailwind.css" />
</head>

<body class="bg-gradient-to-br from-purple-100 to-indigo-100 min-h-screen flex items-center justify-center">

  <main class="bg-white w-full max-w-sm rounded-3xl shadow-2xl p-10 space-y-8">
    <!-- Logo & Title -->
    <div class="flex flex-col items-center">
      <a href="/" class="flex items-center space-x-2 mb-6">
        <span class="font-extrabold text-3xl text-purple-700">FateBound</span>
        <span class="w-4 h-4 bg-purple-700 rounded-full"></span>
      </a>
      <h1 class="text-2xl font-semibold text-gray-800">Accedi al tuo account</h1>
      <p class="text-gray-600 text-sm">Inserisci le tue credenziali qui sotto</p>
    </div>

    <!-- Form -->
    <form action="/login/login.php" method="post" class="space-y-6">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
        <input type="email" id="email" name="email" required
               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 transition" />
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
        <input type="password" id="password" name="password" required
               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 transition" />
      </div>
      <div class="flex items-center justify-between">
        <label class="inline-flex items-center text-sm">
          <input type="checkbox" name="remember" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded" />
          <span class="ml-2 text-gray-600">Ricordami</span>
        </label>
        <a href="#" class="text-sm text-purple-600 hover:underline">Password dimenticata?</a>
      </div>
      <button type="submit" class="w-full py-3 bg-gradient-to-r from-purple-600 to-indigo-500 text-white rounded-2xl font-semibold hover:shadow-lg transition-shadow">
        Accedi
      </button>
    </form>

    <!-- Register Link -->
    <div class="text-center text-sm">
      <span class="text-gray-600">Non hai un account?</span>
      <a href="/register" class="ml-1 text-purple-600 font-medium hover:underline">Registrati</a>
    </div>
  </main>

  <!-- Footer -->
  <footer class="absolute bottom-4 text-center w-full text-gray-600 text-xs">
    © 2025 FateBound. Tutti i diritti riservati.
  </footer>

</body>
</html>