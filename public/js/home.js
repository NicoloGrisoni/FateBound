/**
 * This file contains the functions related to the home page of the site
 */

async function GetStories() {
    const url = `../ajax/stories.php`;

    try {
        let response = await fetch(url);

        if (response.ok) {
            let text = await response.text();
            console.log(text);

            let json = await JSON.parse(text);
            console.log(json);
        } else {
            console.log(response.status)
        }
    } catch (error) {
        console.log(error)
    }
}