/**
 * This file contains the functions related to the login operation
 */

async function DoLogin() {
    const username = document.getElementById("username").value, password = document.getElementById("password").value;
    const url = `../ajax/loginManager.php?username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`;

    try {
        let encodedUrl = encodeURI(url)
        let response = await fetch(encodedUrl);

        if (response.ok) {
            let json = await response.json();
            console.log(json);
        } else {
        }
    } catch (error) {
    }
}