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
<body>
    <!-- 
        What's needed:
        - img to show the image obtained by the Unsplash API based on the title of the current chapter
        - p/labels to display the title of the current chapter
        - p/labels to display the description (if it's setted) of the current chapter
        - div to display the options related to the current chapter, one div dedicated to one option

        Eventually there would be also some other objects in order to make the graphic better
    -->

    <img src="" alt="not-found" id="image"><br>
    <p id="title"></p><br>
    <p id="description"></p><br>
    <div id="options">

    </div>

    <label for="idChapter">Chapter: </label>
    <input type="text" id="idChapter"><br>
    <button onclick="GetChapter()">Chapter</button>
</body>
</html>