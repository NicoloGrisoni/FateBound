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

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 left-0 right-0 z-50 shadow-sm">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <span class="text-2xl font-bold text-gray-900">FateBound</span>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-10">
        <div class="flex flex-row flex-wrap gap-8 items-start">

            <!-- Immagine fissa -->
            <div style="width: 400px; height: 300px;" class="flex-shrink-0">
                <img
                    src=""
                    id="image"
                    alt="Immagine della storia"
                    class="w-full h-full object-cover rounded-xl shadow-md" />
            </div>

            <!-- Dettagli del capitolo -->
            <div class="flex-1 min-w-[250px]">
                <!-- Titolo e descrizione -->
                <div class="max-w-4xl mx-auto mb-10 text-center">
                    <h1 id="title" class="text-4xl font-bold text-gray-800 mb-4">
                        
                    </h1>
                    <p id="description" class="text-lg text-gray-600">
                        
                    </p>
                </div>

                <!-- Opzioni del capitolo -->
                <div id="options" class="max-w-4xl mx-auto grid gap-4">

                </div>
            </div>
        </div>
    </main>
</body>
</html>