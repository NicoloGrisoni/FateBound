/**
 * This file contains the functions related to the single story visualization
 */

async function GetStory() {
    const id = document.getElementById("idStory").value;
    const url = `../ajax/story.php?IDStory=${encodeURIComponent(id)}`;

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();
            //console.log(text);

            let json = await JSON.parse(text);
            console.log(json);
        } else {
            console.log(response.status)
        }
    } catch (error) {
        console.log(error)
    }
}