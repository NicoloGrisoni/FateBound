/**
 * This file contains the functions to obtain the information needed during the execution of the game
 */

async function GetChapter() {
    const id = document.getElementById("idChapter").value;
    const url = `../ajax/chapter.php?IDChapter=${encodeURIComponent(id)}`;

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();
            //console.log(text);

            let json = JSON.parse(text);
            console.log(json);

            let idChapter = json["chapter"].ID
            let responseChapters = await fetch(`../ajax/chapterOptions.php?IDChapter=${idChapter}`);
            if (responseChapters.ok) {
                let textChapter = await responseChapters.text();
                //console.log(textChapter)

                let jsonChapter = JSON.parse(textChapter)
                console.log(jsonChapter)
            }
        } else {
            console.log(response.status)
        }
    } catch (error) {
        console.log(error)
    }
}