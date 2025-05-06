<?php 
    /**
     * This is the home page of the site:
     *  the user can see all the stories he can play (all the stories recorded into the database) (doesn't need the access)
     *  the user can go to the settings of the app to change the theme or see more information about me or the app (doesn't need the access)
     *  whether the user has access into the app, he can also see some more buttons such as the one to visualize his profile
     */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Google Font: Poppins -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    />

    <link rel="stylesheet" href="../build/tailwind.css"/>

    <script src="../js/home.js"></script>
</head>
<body>
    <!-- 
        What's needed:
        - navbar to show 'FateBound', the name of the site, and some button to reach pages such as settings or profile
        - some div to display all the stories recorded into the database, one div dedicated to one story

        Eventually there would be also some other objects in order to make the graphic better
    -->

    <button onclick="GetStories()">Storie</button>
</body>
</html>