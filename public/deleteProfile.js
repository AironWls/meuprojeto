import { settings } from "./settings.js"

const listBtnDelProfile = document.querySelectorAll("[btn-delete-profile]")

listBtnDelProfile.forEach(element => {element.addEventListener('click', deleteProfile, false)})

async function deleteProfile(event)
{
    event.preventDefault()

    const tr = event.target.closest("tr")
    const profile_id = tr.children[0].textContent

    const myHeaders = new Headers()
    myHeaders.append("Content-Type", "text/json")
    myHeaders.append("Accept", "text/json")
    myHeaders.append("X-CSRF-TOKEN", settings.token)

    const myInit = {
        method: 'DELETE',
        headers: myHeaders,
        body: JSON.stringify({
            profile_id: profile_id
        })

    }

    const response = await fetch(`${settings.urlCurrent}/destroy_profile_to_user`, myInit)

    if (response.ok) {
        tr.remove()
    } else {
        const result = await response.json()
        alert(`${result.status}`)
    }
}
