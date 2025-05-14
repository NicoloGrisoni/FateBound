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
    const container = document.createElement("div")
    container.className = "bg-light-card dark:bg-dark-card rounded-card overflow-hidden shadow-light dark:shadow-dark hover-lift"

    const div = document.createElement("div")
    div.className = "p-4"

    const title = document.createElement("h3")
    title.innerHTML = story["title"]
    title.className = "font-bold text-lg mb-1"
    div.appendChild(title)

    const description = document.createElement("p")
    description.innerHTML = story["description"]
    description.className = "text-light-text-secondary dark:text-dark-text-secondary text-sm mb-3 line-clamp-2"
    div.appendChild(description)

    const more = document.createElement("div")
    more.className = "mt-4 pt-4 flex justify-between"

    const details = document.createElement("a")
    details.className = "text-primary hover:underline font-medium"
    details.href = `./story.php?idStory=${story.ID}`
    details.innerHTML = "View details"
    more.appendChild(details)
    div.appendChild(more)

    container.appendChild(div)
    return container
}