/**
 * This file contains the functions related to the registration
 */

async function Registration() {
    const username = document.getElementById("username").value, password = document.getElementById("password").value;
    const url = `../ajax/registrationManager.php?username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`;

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();

            let json = await JSON.parse(text);
            console.log(json);

            if (json["status"] === "Success") {
                window.location.href = "../main/home.php";
            }
        } else {
            console.log(response.status)
        }
    } catch (error) {
        console.log(error)
    }
}