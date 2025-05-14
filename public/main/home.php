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
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 left-0 right-0 z-50">
      <div
        class="container mx-auto px-6 py-3 flex justify-between items-center"
      >
        <div class="flex items-center">
          <span class="text-2xl font-bold text-gray-900">FateBound</span>
        </div>
        <div class="flex items-center gap-3">
          <?php 
            if (isset($_SESSION["idUser"]) && !empty($_SESSION["idUser"])) {
                echo "
                    <a
                        href = './profileView.php'
                        class='py-2 px-4 rounded-button border border-light-border dark:border-dark-border hover:bg-light-border dark:hover:bg-dark-border transition-colors'
                        >Profile
                    </a>
                ";
            } else {
                echo "
                    <a
                        href = '../login/login.php'
                        class='py-2 px-4 rounded-button border border-light-border dark:border-dark-border hover:bg-light-border dark:hover:bg-dark-border transition-colors'
                        >Login
                    </a>
                ";
            }
          ?>
        </div>
      </div>
    </nav>

    <div class="container mx-auto px-4 py-8 md:py-12">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div class="flex flex-col items-center">
            <h1 class="text-2xl md:text-3xl font-bold mb-2">Game Library</h1>
            <p class="text-light-text-secondary dark:text-dark-text-secondary">Discover and play interactive stories</p>
        </div>
    </div>
    
    <div 
        id="stories-grid"
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        
    </div>
</div>
</body>
</html>