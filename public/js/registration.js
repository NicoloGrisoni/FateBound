/**
 * This file contains the functions related to the registration
 */

async function Registration() {
    const username = document.getElementById("username").value, password = document.getElementById("password").value;
    const url = `../ajax/registrationManager.php?username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`;

    try {
        let encodedUrl = encodeURI(url)
        let response = await fetch(encodedUrl);

        if (response.ok) {
            let text = await response.text();
            console.log(text);

            let json = await JSON.parse(text);
            console.log(json);
        } else {
        }
    } catch (error) {
    }
}