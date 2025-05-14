/**
 * This file contains the functions related to the profile management
 */

let user = null;

document.addEventListener("DOMContentLoaded", function () {
    ViewProfileInformation();
});

async function ViewProfileInformation() {
    const url = `../ajax/userInformation.php`;

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();
            let json = JSON.parse(text);
            console.log(json);

            user = json;
            SetTags(json);
            GetInteractions(json["user"].ID);
        } else {
        console.log(response.status);
        }
    } catch (error) {
        console.log(error);
    }
}

async function GetInteractions(idUser) {
    const url = `../ajax/interaction.php`;

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();
            let json = JSON.parse(text);
            console.log(json);

            if (json["status"] === "Success") {
                CreateInteractions(json.interactions);
            }
        } else {
        console.log(response.status);
        }
    } catch (error) {
        console.log(error);
    }
}

async function GetInteractionStory(interaction, element) {
    const url = `../ajax/story.php?IDStory=${encodeURIComponent(interaction.chapter.IDStory)}`

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();
            let json = JSON.parse(text);
            console.log(json);

            if (json["status"] === "Success") {
                element.innerHTML = json["story"].title
            } else {
                element.innerHTML = "Title of the story not available"
            }
        } else {
            console.log(response.status);
            return null
        }
    } catch (error) {
        console.log(error)
        return null
    }
}

function SetTags(info) {
    document.getElementById("username").value = info["user"].username;
    document.getElementById("profile-pic").src = `../images/${info["user"].profile_picture}`;
}

function CreateInteractions(interactions) {
    for (let i = 0; i < interactions.length; i++) {
        const interaction = interactions[i]
        const divInteraction = CreateInteraction(interaction)
        document.getElementById("interactions").appendChild(divInteraction)
    }
}

function CreateInteraction(interaction) {
    const container = document.createElement("div");
    container.className = "flex items-center gap-2";
        
    const inter = document.createElement("h3");
    inter.className = "font-medium";

    let story = GetInteractionStory(interaction, inter)

    container.appendChild(inter)

    const span = document.createElement("span");
    span.className = "text-xs bg-primary/20 text-primary px-2 py-0.5 rounded-full";
    span.textContent = interaction.date;
    container.appendChild(span)

    return container
}

async function Logout() {
    const url = "../ajax/logout.php";

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();
            let json = JSON.parse(text);
            console.log(json);

            if (json["status"] === "Success") {
                window.location.href = "../index.html";
            } else {
                console.log(response.status);
            }
        } else {
            console.log(response.status)
        }
    } catch (error) {
        console.log(error);
    }
}

async function ModifyInfo() {
    const baseUrl = "../ajax/updateUserInformation.php";

    const profile_picture = document.getElementById("newProfilePicture").files[0];
    const username = document.getElementById('username').value;

    if (profile_picture !== null) {
        const formData = new FormData()
        formData.append("profilePicture", profile_picture)

        try {
            let response = await fetch(baseUrl, {
                method: "POST",
                body: formData
            })

            if (response.ok) {
                let text = await response.text()
                console.log(text)

                let json = JSON.parse(text)

                if (json["status"] === "Success") {
                    if (username === null || username === user.username) {
                        window.location.href = "./profileView.php"
                    }
                }
            } else {
                console.log(response.status)
            }
        } catch (error) {
            console.log(error)
        }
    }
    
    if (username !== null) {
        let url = baseUrl + `?newUsername=${username}`
        
        try {
            let response = await fetch(url)

            if (response.ok) {
                let text = await response.text()
                let json = JSON.parse(text)

                console.log(json)

                if (json["status"] === "Success") {
                    window.location.href = "./profileView.php"
                }
            } else {
                console.log(response.status)
            }
        } catch (error) {
            console.log(error)
        }
    }
}

async function DeleteProfilePicture() {
    const url = "../ajax/deleteProfilePicture.php";

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();
            let json = JSON.parse(text);
            console.log(json);

            if (json["status"] === "Success") {
                window.location.href = "./profileView.php";
            } else {
                console.log(response.status);
            }
        } else {
            console.log(response.status)
        }
    } catch (error) {
        console.log(error);
    }
}