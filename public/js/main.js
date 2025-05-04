/**
 * This file contains the functions which are used by two or more pages such as the theme setting
 */

async function CallService(url) {
    try {
        let encodedUrl = encodeURI(url)
        let response = await fetch(encodedUrl);

        if (response.ok) {
            let text = await response.text();
            console.log(text);

            let json = JSON.parse(text);
            console.log(json);
            return json;
        } else {
            return null;
        }
    } catch (error) {
        return null;
    }
}