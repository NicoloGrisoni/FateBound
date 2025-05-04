/**
 * This file contains the functions related to the registration
 */

async function Registration() {
    const username = document.getElementById("username").value, password = document.getElementById("password");
    const url = `../ajax/registrationManager.php?username=${username}&password=${password}`;

    let response = await CallService(url);
    console.log(response);
}