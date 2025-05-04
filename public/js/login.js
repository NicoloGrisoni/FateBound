/**
 * This file contains the functions related to the login operation
 */

async function DoLogin() {
    const username = document.getElementById("username").value, password = document.getElementById("password");
    const url = `../ajax/loginManager.php?username=${username}&password=${password}`;

    let response = await CallService(url);
    console.log(response);
}