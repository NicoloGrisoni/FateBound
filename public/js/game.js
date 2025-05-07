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

            SetImageUnsplah(json["chapter"].title + json["chapter"].description)
            document.getElementById("title").innerHTML = json["chapter"].title
            document.getElementById("description").innerHTML = json["chapter"].description
        } else {
            console.log(response.status)
        }
    } catch (error) {
        console.log(error)
    }
}

async function SetImageUnsplah(search) {
    const UnsplashApiKey = "Y033JaPjRjSuKxiNB4mTmWq_RWcW7-65ETq7lZ9sotE";
    const unsplashUrl = `https://api.unsplash.com/search/photos?query=${encodeURIComponent(search)}&per_page=1&order_by=relevant&lang=it`;

    const responseImage = await fetch(unsplashUrl, {
        headers: {
            'Authorization': `Client-ID ${UnsplashApiKey}`
        }
    });

    if (!responseImage.ok) {
        console.error(`Unsplash API error: ${responseImage.status}`);
    } else {
        const dataImage = await responseImage.json();
        if (dataImage.results && dataImage.results.length > 0) {
            const imageUrl = dataImage.results[0].urls.small;
            document.getElementById("image").src = imageUrl;
        } else {
            console.warn("Nessuna immagine trovata per:", search);
        }
    }
}