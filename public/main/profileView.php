<?php 
    /**
     * In this page the user can view all the information of his profile
     */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Google Font: Poppins -->
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet"
    />

    <link rel="stylesheet" href="../build/tailwind.css"/>

    <script src="../js/profile.js"></script>
</head>
<body class="bg-gray-100 font-[Poppins] min-h-screen flex items-center justify-center">

    <!-- 
        What's needed:
        - img to display the user's profile picture (if it's null, then it would show the default image)
        - labels to display the username and the password
        - button for changing the updateble information (it redirect the user to the page where it's possible to modify the info)

        Eventually there would be also some other objects in order to make the graphic better
    -->

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md text-center">
        <!-- Profile picture -->
        <img 
            id="profile-pic"
            alt="Profile Picture" 
            class="w-32 h-32 mx-auto rounded-full object-cover border-4 border-blue-300 mb-4"
        >

        <!-- Username -->
        <label for="username">Username: </label>
        <p id="username" class="text-xl font-semibold text-gray-800"></p>

        <!-- Update info button -->
        <button 
            onclick="window.location.href=profileModify.php"
            class="mt-6 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition"
        >
            Modifica Profilo
        </button>
    </div>
</body>
</html>