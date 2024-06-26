import { settings } from "./settings.js"

const listBtnDelete = document.querySelectorAll('[data-button-delete]')

listBtnDelete.forEach(element => element.addEventListener('click', destroy, false))

async function destroy(event)
{
    event.preventDefault()

    const tr = event.target.closest("tr")
    const id = tr.children[1].textContent
    const td = event.target.closest('td')

    const myHeaders = new Headers()
    myHeaders.append("Content-Type", "text/json")
    myHeaders.append("Accept", "text/json")
    myHeaders.append("X-CSRF-TOKEN", settings.token)

    const myInit = {
        method: 'DELETE',
        headers: myHeaders
    }

    tr.innerHTML = loadSpinner()

    const response = await fetch(`${settings.urlCurrent}/${id}`, myInit)
    if (response.ok) {
        const json = await response.json()
        tr.remove()
    } else {
        alert('Something wrong happened')
        td.innerHTML = ''
        td.innerHTML = `<button data-button-delete class="btn btn-sm btn-success" title="Remover" aria-label="Remover"><i class="fa-solid fa-trash"></i></button>`
    }

}

function loadSpinner() {
    return `
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    `;
}
