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
    rel="stylesheet"
    />

    <link rel="stylesheet" href="../build/tailwind.css"/>

    <script src="../js/story.js"></script>
</head>
<body>
    <!-- 
        What's needed:
        - img to show the image obtained by the Unsplash API based on the title of the story
        - labels/p to display all the information about the title and the description of the story
        - button to play the story

        Eventually there would be also some other objects in order to make the graphic better
    -->

    <label for="idStory">ID storia: </label>
    <input type="text" id="idStory"><br>
    <button onclick="GetStory()">Story</button>
</body>
</html>