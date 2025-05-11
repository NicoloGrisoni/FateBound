/**
 * This file contains the functions related to the profile management
 */

document.addEventListener("DOMContentLoaded", function() {
    ViewProfileInformation()
})

async function ViewProfileInformation() {
    const url = `../ajax/userInformation.php`

    try {
        let response = await fetch(url)

        if (response.ok) {
            let text = await response.text()
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
    document.getElementById("username").innerHTML = info["user"].username

    if (info["user"].profile_picture === null) {
        document.getElementById("profile-pic").src = "../images/default.png"
    } else {
        document.getElementById("profile-pic").src = `../images/${info["user"].profile_picture}`
    }
}