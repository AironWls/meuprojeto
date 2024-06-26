import { settings } from "./settings.js"

const listBtnDelProfile = document.querySelectorAll("[btn-delete-role]")

listBtnDelProfile.forEach(element => {element.addEventListener('click', deleteRole, false)})

async function deleteRole(event)
{
    event.preventDefault()

    const tr = event.target.closest("tr")
    const role_id = tr.children[0].textContent

    const myHeaders = new Headers()
    myHeaders.append("Content-Type", "text/json")
    myHeaders.append("Accept", "text/json")
    myHeaders.append("X-CSRF-TOKEN", settings.token)

    const myInit = {
        method: 'DELETE',
        headers: myHeaders,
        body: JSON.stringify({
            role_id: role_id
        })

    }

    const response = await fetch(`${settings.urlCurrent}/destroy_role_to_profile`, myInit)

    if (response.ok) {
        tr.remove()
    } else {
        const result = await response.json()
        alert(`${result.status}`)
    }
}
