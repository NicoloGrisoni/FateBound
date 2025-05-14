<?php 
    /**
     * This page is the game itself:
     *  when a user select a story and decide to play, this is the page where all the information of a chapter are displayed
     *  the information include the following information:
     *      the image related to the chapter (Unsplash API)
     *      the title of the chapter and its description
     *      all the options the user can make in the chapter (if it's a final chapter, the summary of the game just played)
     */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>

    <!-- Google Font: Poppins -->
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet"
    />

    <link rel="stylesheet" href="../build/tailwind.css"/>

    <script src="../js/game.js"></script>
</head>
<body class="bg-gray-100 font-[Poppins]">

    <!-- 
        What's needed:
        - img to show the image obtained by the Unsplash API based on the title of the current chapter
        - p/labels to display the title of the current chapter
        - p/labels to display the description (if it's setted) of the current chapter
        - div to display the options related to the current chapter, one div dedicated to one option

        Eventually there would be also some other objects in order to make the graphic better
    -->

    <input type="hidden" id="firstChapter" value="<?php echo $_GET["idChapter"]?>">

    <div class="min-h-[calc(100vh-140px)] flex flex-col bg-light-bg dark:bg-dark-bg">
    <div class="border-b border-light-border dark:border-dark-border py-2 px-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-2">
                <a href="index.php?page=story-details" class="p-2 rounded-full hover:bg-light-border dark:hover:bg-dark-border transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold" onclick="window.location.href='./home.php'">Back</h1>
            </div>
        </div>
    </div>
    
    <!-- Game Content -->
    <div class="flex-1 flex flex-col max-w-3xl mx-auto w-full px-4 py-8">
        <div class="w-full md:w-1/3">
            <div 
            class="rounded-card flex items-center justify-center overflow-hidden bg-light-border dark:bg-dark-border w-30 h-30" 
            id="story-image">
                <img id="image" alt="Chapter cover" class="max-w-full max-h-full object-contain p-2">
            </div>
        </div>
        
        <h2 id="title" class="text-2xl font-bold mb-4">Chapter Title</h2>
        
        <div class="bg-light-card dark:bg-dark-card rounded-card shadow-light dark:shadow-dark p-6 mb-6">
            <p id="description" class="text-lg">
                
            </p>
        </div>

        <div id="options" class="space-y-3 flex flex-row justify-center items-center">
        
        </div>
    </div>
</div>
</body>
</html>