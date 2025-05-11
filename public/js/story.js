/**
 * This file contains the functions related to the single story visualization
 */

document.addEventListener("DOMContentLoaded", function(){
    const idStory = document.getElementById("idStory").value
    SetStory(idStory)
})

async function SetStory(idStory) {
    const url = `../ajax/story.php?IDStory=${encodeURIComponent(idStory)}`

    try {
        let response = await fetch(url)

        if (response.ok) {
            let text = await response.text()
            //console.log(text)

            let json = JSON.parse(text)
            console.log(json)

            SetTags(json)
        } else {
            console.log(response.status)
        }
    } catch (error) {
        console.log(error)
    }
}

function SetTags(info) {
    document.getElementById("title").innerHTML = info["story"].title
    document.getElementById("description").innerHTML = info["story"].description
    document.getElementById("chapters").innerHTML = "Capitoli:" + info.chapters.length
    document.getElementById("endings").innerHTML = "Finali: " + info.finals
    document.getElementById("firstChapter").value = info.chapters[0].ID
    GetImgStory(info["story"].title)
}

async function GetImgStory(title) {
    const UnsplashApiKey = "Y033JaPjRjSuKxiNB4mTmWq_RWcW7-65ETq7lZ9sotE";
    const unsplashUrl = `https://api.unsplash.com/search/photos?query=${encodeURIComponent(title)}&per_page=1&order_by=relevant&lang=it`;

    const responseImage = await fetch(unsplashUrl, {
        headers: {
            'Authorization': `Client-ID ${UnsplashApiKey}`
        }
    });

    if (!responseImage.ok) {
        console.error(`Unsplash API error: ${responseImage.status}`);
        return null
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

function Play() {
    const idFirstChapter = document.getElementById("firstChapter").value;
    window.location.href = `./game.php?idChapter=${idFirstChapter}`
}