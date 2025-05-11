/**
 * This file contains the functions related to the home page of the site
 */

document.addEventListener("DOMContentLoaded", function() {
    GetStories()
})

async function GetStories() {
    const url = `../ajax/stories.php`

    try {
        let response = await fetch(url)

        if (response.ok) {
            let text = await response.text()
            console.log(text)

            let json = await JSON.parse(text)
            console.log(json)

            CreateDivs(json["stories"])
        } else {
            console.log(response.status)
        }
    } catch (error) {
        console.log(error)
    }
}

function CreateDivs(stories) {
    const divStories = document.getElementById("stories-grid")
    for (let i = 0; i < stories.length; i++) {
        const story = stories[i]
        const storyContainer = CreateStoryTags(story)
        divStories.appendChild(storyContainer)
    }
}

function CreateStoryTags(story) {
    const container = document.createElement("a");
    container.className = 
    "group block rounded-xl border border-custom-purple-accent/50 hover:border-custom-purple-accent bg-purple-50/30 text-gray-800 p-5 sm:p-6 aspect-[4/3] flex flex-col justify-between items-center text-center overflow-hidden transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-custom-purple-accent focus:ring-offset-2";
    container.href = `./story.php?idStory=${story["ID"]}`;

    const title = document.createElement("h3");
    title.innerHTML = story["title"];
    title.className = "story-card-title text-lg sm:text-xl font-semibold leading-tight text-violet-800 mb-1 sm:mb-1.5";
    container.appendChild(title);

    const description = document.createElement("p");
    description.innerHTML = story["description"];
    description.className = "text-xs sm:text-sm text-gray-700 mt-2 hidden group-hover:block transition-opacity duration-300 ease-in-out leading-snug";
    container.appendChild(description);

    return container;
}