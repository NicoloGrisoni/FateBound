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

    <input type="hidden" id="idStory" value="<?php echo $_GET["idStory"] ?>">
    <input type="hidden" id="firstChapter">

    <!-- Navbar semplice o include se ne hai una -->
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

            <!-- Dettagli della storia -->
            <div class="flex-1 min-w-[250px]">
                <h1 id="title" class="text-3xl font-bold text-gray-900 mb-4">
                </h1>
                <p id="description" class="text-gray-700 mb-6">
                </p>
                <p id="chapters" class="text-sm text-gray-600"></p>
                <p id="endings" class="text-sm text-gray-600"></p>

                <button
                    id="game"
                    onclick="Play()"
                    class="bg-custom-purple-accent hover:bg-opacity-90 text-white px-6 py-3 rounded-lg font-medium transition-colors shadow-md hover:shadow-lg mb-4">
                    Gioca
                </button>
            </div>

        </div>
    </main>
</body>
</html>