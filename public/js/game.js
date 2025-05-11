/**
 * This file contains the functions to obtain the information needed during the execution of the game
 */

const divOptions = document.getElementById("options")

document.addEventListener("DOMContentLoaded", function() {
    const firstChapter = document.getElementById("firstChapter").value
    GetChapter(firstChapter)
})

async function GetChapter(idChapter) {
    divOptions.innerHTML = "";

    const url = `../ajax/chapter.php?IDChapter=${encodeURIComponent(idChapter)}`;

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();
            let json = JSON.parse(text);
            console.log(json);

            SetTags(json)


            if (json["chapter"].isFinal === 0) {
                let idChapter = json["chapter"].ID
                GetOptions(idChapter)
            } else {
                SetFinal()
            }
        } else {
            console.log(response.status)
        }
    } catch (error) {
        console.log(error)
    }
}

async function GetOptions(idChapter) {
    const url = `../ajax/chapterOptions.php?IDChapter=${encodeURIComponent(idChapter)}`;

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();
            let json = JSON.parse(text)
            console.log(json)

            CreateOptions(json.options)
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

    try {
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
    } catch (error) {
        console.log(error)
    }
}

function SetTags(info) {
    document.getElementById("title").innerHTML = info["chapter"].title
    document.getElementById("description").innerHTML = info["chapter"].description
    SetImageUnsplah(info["chapter"].title + info["chapter"].description)
}

function SetFinal() {
    const end = document.createElement("button")
    end.onclick = () => window.location.href = "./home.php"
    end.innerHTML = "Fine"

    divOptions.appendChild(end)
}

function CreateOptions(options) {
    for (let i = 0; i < options.length; i++) {
        const option = options[i]
        const divOption = CreateOption(option)
        divOptions.appendChild(divOption)
    }
}

function CreateOption(option) {
    const div = document.createElement("div")
    div.className = "option bg-white rounded-xl shadow-md p-4 cursor-pointer hover:bg-blue-100 transition"
    div.onclick = () => GetChapter(option.IDNextChapter)

    const description = document.createElement("p")
    description.innerHTML = option.description
    description.className = "text-gray-800 text-lg font-medium"
    div.appendChild(description)

    return div
}