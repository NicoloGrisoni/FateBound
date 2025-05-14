<?php 
    /**
     * In this page the user can modify all the updatable information of his profile
     */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify profile</title>

    <!-- Google Font: Poppins -->
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet"
    />

    <link rel="stylesheet" href="../build/tailwind.css"/>

    <script src="../js/profile.js"></script>
</head>
<body>
    <!-- 
        What's needed:
        - img to display the user's profile picture (if it's null, then it would show the default image)
            with a button to modify the image (window to choose the new image with the entire path)
        - input text to display the username and the password
        - button for confirm the changes

        Eventually there would be also some other objects in order to make the graphic better
    -->

    <div class="container mx-auto px-4 py-8 md:py-12">
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl md:text-3xl font-bold">Edit Profile</h1>
            <a href="./profileView.php" class="text-primary hover:underline flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Profile
            </a>
        </div>
        
        <div class="bg-light-card dark:bg-dark-card rounded-card shadow-light dark:shadow-dark overflow-hidden mb-8">
            <div class="p-6">
                <h2 class="text-xl font-bold mb-4">Profile Picture</h2>
                <div class="flex flex-col sm:flex-row items-center gap-6">
                    <div class="w-32 h-32 rounded-full overflow-hidden border-2 border-light-border dark:border-dark-border">
                        <img src="" id="profile-pic" alt="Profile Picture" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-wrap gap-2">
                            <input type="file" id="newProfilePicture" class="py-2 px-4 rounded-button">
                            <button onclick="DeleteProfilePicture()" class="py-2 px-4 rounded-button border border-light-border dark:border-dark-border hover:bg-light-border dark:hover:bg-dark-border transition-colors">Remove</button>
                        </div>
                        <p class="text-sm text-light-text-secondary dark:text-dark-text-secondary">
                            Recommended: Square image, at least 200x200 pixels, JPG or PNG format.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-light-border dark:border-dark-border p-6">
                <h2 class="text-xl font-bold mb-4">Profile Information</h2>
                <div class="grid grid-cols-1 gap-6">
                    <div class="space-y-2">
                        <label for="username" class="block text-sm font-medium">Username</label>
                        <div class="flex">
                            <input type="text" id="username" class="block w-full rounded-none rounded-r-md px-3 py-2 border border-light-border dark:border-dark-border bg-light-bg dark:bg-dark-bg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                        </div>
                        <p class="text-xs text-light-text-secondary dark:text-dark-text-secondary">
                            Your unique username. Can only contain letters, numbers, and underscores.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end gap-2">
            <a href="./profileView.php" class="py-2 px-4 rounded-button border border-light-border dark:border-dark-border hover:bg-light-border dark:hover:bg-dark-border transition-colors">
                Cancel
            </a>
            <button onclick="ModifyInfo()" class="py-2 px-4 rounded-button bg-primary text-white hover:bg-primary-dark transition-colors">
                Save Changes
            </button>
        </div>
    </div>
</div>
</body>
</html>