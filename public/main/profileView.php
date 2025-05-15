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
<body class="bg-gradient-to-br from-custom-bg-start to-custom-bg-end min-h-screen flex flex-col items-center justify-center antialiased pt-10 pb-10 px-4">
    <!-- 
        What's needed:
        - img to display the user's profile picture (if it's null, then it would show the default image)
        - labels to display the username and the password
        - button for changing the updateble information (it redirect the user to the page where it's possible to modify the info)

        Eventually there would be also some other objects in order to make the graphic better
    -->
<div class="container mx-auto px-4 py-8 md:py-12">
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl md:text-3xl font-bold">Your Profile</h1>
            <a href="./home.php" class="text-primary hover:underline flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Home
            </a>
        </div>
        
        <div class="bg-light-card dark:bg-dark-card rounded-card shadow-light dark:shadow-dark overflow-hidden mb-8 p-8">
            <!-- Profile Picture - Centered -->
            <div class="flex flex-col items-center justify-center">
                <div class="w-32 h-32 rounded-full flex items-center justify-center overflow-hidden border-2 border-light-border dark:border-dark-border mb-6">
                    <img id="profile-pic" alt="Profile Picture" class="w-full h-full object-cover">
                </div>
                
                <!-- Username - Larger and centered -->
                <h2 class="text-3xl font-bold mb-8 text-center" id="username"></h2>
                
                <!-- Buttons - Centered horizontally -->
                <div class="flex justify-center gap-4 w-full">
                    <a href="./profileModify.php" class="py-2 px-6 rounded-button border border-light-border dark:border-dark-border hover:bg-light-border dark:hover:bg-dark-border transition-colors">
                        Edit Profile
                    </a>
                    <a onclick="Logout()" class="py-2 px-6 rounded-button border border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition-colors cursor-pointer">
                        Logout
                    </a>
                </div>
            </div>
        </div>
        
        <div class="bg-light-card dark:bg-dark-card rounded-card shadow-light dark:shadow-dark p-6 mb-8">
            <h2 class="text-xl font-bold mb-4">Recent Activity</h2>
            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <div id="interactions">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>