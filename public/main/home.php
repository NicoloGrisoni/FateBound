<?php 
    /**
     * This is the home page of the site:
     *  the user can see all the stories he can play (all the stories recorded into the database) (doesn't need the access)
     *  the user can go to the settings of the app to change the theme or see more information about me or the app (doesn't need the access)
     *  whether the user has access into the app, he can also see some more buttons such as the one to visualize his profile
     */

    if (!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - FateBound</title>

    <!-- Google Font: Poppins -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />

    <link rel="stylesheet" href="../build/tailwind.css"/>

    <script src="../js/home.js"></script>
</head>
<body class="font-[Poppins,_sans-serif] bg-gradient-to-br from-custom-bg-start to-custom-bg-end min-h-screen flex flex-col antialiased text-gray-800">
    <!-- 
        What's needed:
        - navbar to show 'FateBound', the name of the site, and some button to reach pages such as settings or profile
        - some div to display all the stories recorded into the database, one div dedicated to one story

        Eventually there would be also some other objects in order to make the graphic better
    -->
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 left-0 right-0 z-50">
      <div
        class="container mx-auto px-6 py-3 flex justify-between items-center"
      >
        <div class="flex items-center">
          <a class="text-2xl font-bold text-gray-900" href="../index.html">FateBound</a>
        </div>
        <div class="flex items-center gap-3">
          <a
            href="./settings.php"
            class="text-custom-purple-accent hover:text-white border border-custom-purple-accent hover:bg-custom-purple-accent/90 rounded-lg px-4 py-2 text-sm font-medium transition-colors"
            >Impostazioni</a
          >
          <?php 
            if (isset($_SESSION["userId"])) {
                echo "
                <a href='./profileView.php' title='Profilo' 
                class='hover:bg-opacity-90 text-white rounded-lg px-4 py-2 text-sm font-medium transition-colors'>
                    <img src='../images/default.png' alt='profile' 
                    class='w-full h-full object-cover'>
                </a>
                ";
            } else {
                echo "
                <a href='../login/login.php' 
                class='bg-custom-purple-accent hover:bg-opacity-90 text-white rounded-lg px-4 py-2 text-sm font-medium transition-colors'>
                    Login
                </a>
                ";
            }
        ?>
        </div>
      </div>
    </nav>

    <!-- Contenuto Principale -->
    <main class="container mx-auto px-4 sm:px-6 py-8 sm:py-12 flex-grow w-full">
        <header class="mb-8 sm:mb-12 text-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900">Scopri le Nostre Storie</h1>
            <p class="mt-2 sm:mt-3 text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">Immergiti in avventure interattive dove ogni tua scelta conta.</p>
        </header>

        <div id="stories-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 sm:gap-10">

        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full py-6 sm:py-8 text-center text-xs sm:text-sm text-gray-500 border-t border-gray-200/70 mt-auto">
        &copy; <?php echo date("Y"); ?> FateBound. Tutti i diritti riservati.
    </footer>
</body>
</html>