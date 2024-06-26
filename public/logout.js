import { settings } from './settings.js'

const btnLogout = document.querySelector('#btnLogout')

btnLogout.addEventListener('click', logout, false)


async function logout(event) {
    event.preventDefault()

    const h = new Headers()
    h.append("Content-Type", "application/json")
    h.append("Accept", "application/json")
    h.append("X-CSRF-TOKEN", settings.token)

    const myInit = {
        method: 'POST',
        headers: h
    }

    const response = await fetch("http://localhost:8000/logout", myInit)
    if ( !response.ok ) {
        const message = `An error has ocurred: ${response.status}`
        throw new Error(message)
    }
    location.replace(location.href)
}
