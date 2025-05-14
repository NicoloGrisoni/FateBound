/**
 * This file contains the functions to obtain the information needed during the execution of the game
 */

document.addEventListener("DOMContentLoaded", function() {
    const firstChapter = document.getElementById("firstChapter").value
    GetChapter(firstChapter)
})

async function GetChapter(idChapter) {
    document.getElementById("options").innerHTML = "";

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

            UpdateInteraction(json["chapter"].ID)
        } else {
            console.log(response.status)
        }
    } catch (error) {
        console.log(error)
    }
}

async function UpdateInteraction(idChapter) {
    const url = `../ajax/updateInteraction.php?idChapter=${encodeURIComponent(idChapter)}`;

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();
            let json = JSON.parse(text);
            console.log(json);
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
    end.className = "bg-light-card dark:bg-dark-card rounded-card shadow-light dark:shadow-dark p-6 mb-6 text-primary"
    end.onclick = () => window.location.href = "./home.php"
    end.innerHTML = "Fine"

    document.getElementById("options").appendChild(end)
}

function CreateOptions(options) {
    for (let i = 0; i < options.length; i++) {
        const option = options[i]
        const divOption = CreateOption(option)
        document.getElementById("options").appendChild(divOption)
    }
}

function CreateOption(option) {
    const btn = document.createElement("button");
    btn.className = "bg-light-card dark:bg-dark-card rounded-card shadow-light dark:shadow-dark p-6 mb-6";
    btn.onclick = () => GetChapter(option.IDNextChapter);
        
    const div = document.createElement("div");
    div.className = "flex items-center";
        
    const span = document.createElement("span");
    span.className = "mr-2 opacity-0 group-hover:opacity-100 transition-opacity";
    span.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
    </svg>`;
        
    const textSpan = document.createElement("span");
    textSpan.className = "text-primary";
    textSpan.textContent = option.description;

    div.appendChild(span);
    div.appendChild(textSpan);
    btn.appendChild(div);
    return btn
}