<?php
/**
 * This page allows to view all the information of a story, such as its title, its description and a related image
 * Then, he can push the button to play the story
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story</title>

    <!-- Google Font: Poppins -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../build/tailwind.css" />

    <script src="../js/story.js"></script>
</head>

<body class="font-['Poppins',_sans-serif] bg-white text-gray-800 antialiased">
    <!-- 
        What's needed:
        - img to show the image obtained by the Unsplash API based on the title of the story
        - labels/p to display all the information about the title and the description of the story
        - button to play the story

        Eventually there would be also some other objects in order to make the graphic better
    -->
    <?php 
        if (isset($_GET["idStory"]) && !empty($_GET["idStory"])) {
            $id = $_GET["idStory"];
            echo "
                <input type='hidden' value='$id' id='idStory'>
            ";
        } 
    ?>
    <div class="min-h-[calc(100vh-140px)] flex items-center justify-center py-12 px-4">
        <div class="w-full max-w-2xl bg-light-card dark:bg-dark-card rounded-card shadow-light dark:shadow-dark p-8 transition-all hover-lift">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Story Image -->
                <div class="w-full md:w-1/3">
                    <div 
                    class="rounded-card flex items-center justify-center overflow-hidden bg-light-border dark:bg-dark-border w-30 h-30" 
                    id="story-image">
                        <img id="image" alt="Story Cover" class="max-w-full max-h-full object-contain p-2">
                    </div>
                </div>
                
                <!-- Story Details -->
                <div class="w-full md:w-2/3">
                    <h1 id="title" class="text-2xl font-bold mb-4"></h1>
                    
                    <p id="description" class="text-light-text-secondary dark:text-dark-text-secondary mb-6">
                        
                    </p>
                    
                    <div class="flex flex-wrap gap-4 mb-6">
                        <div class="bg-primary/10 rounded-lg px-3 py-1.5">
                            <span id="chapters" class="text-sm font-medium"></span>
                        </div>
                        <div class="bg-primary/10 rounded-lg px-3 py-1.5">
                            <span id="endings" class="text-sm font-medium"></span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-3 mt-8">
                        <button 
                            onclick="Play()" 
                            class="py-2 px-6 rounded-button bg-primary text-white hover:bg-primary-dark transition-colors">
                            Inizia Storia
                        </button>
                        <a
                            href="./home.php"
                            class="py-2 px-4 rounded-button border border-light-border dark:border-dark-border hover:bg-light-border dark:hover:bg-dark-border transition-colors"
                            >Home
                        </a>
                    </div>
                    
                    <input type="hidden" id="firstChapter" value="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>