import { settings } from "./settings.js"

const listBtnStatus = document.querySelectorAll("[data-button-status]")

listBtnStatus.forEach(element => element.addEventListener('click', changeStatus, false))

async function changeStatus(event)
{
    event.preventDefault()
    const id = event.target.closest('tr').children[1].textContent
    const td = event.target.closest("td")

    const myHeaders = new Headers()
    myHeaders.append("Content-Type", "text/json")
    myHeaders.append("Accept", "text/json")
    myHeaders.append("X-CSRF-TOKEN", settings.token)

    const myInit = {
        method: 'PATCH',
        headers: myHeaders
    }

    td.innerHTML = loadSpinner()

    const response = await fetch(`${settings.urlCurrent}/${id}/status`, myInit)
    if ( response.ok ) {
        const json = await response.json()
        td.innerHTML = ''
        td.innerHTML = loadButton(json.rstatus)
        td.children[0].addEventListener('click', changeStatus, false)
    } else {
        const json = await response.json()
        alert('Something wrong happened')
        td.innerHTML = ''
        td.innerHTML = `<button data-button-status class="btn btn-sm btn-success rounded-0" title="Ativo" aria-label="Ativo"><i class="fa-solid fa-thumbs-up"></i></button>`
    }

}

function loadSpinner() {
    return `
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    `;
}

function loadButton(response) {
    return (response === 1) ? `<button aria-label='Ativo' title='Ativo' data-button-status class='btn btn-sm btn-success rounded-0'><i class='fa-solid fa-thumbs-up'></i></button>` : `<button aria-label='Inativo' title='Inativo' data-button-status class='btn btn-sm btn-warning rounded-0'><i class='fa-solid fa-thumbs-down'></i></button>`
}
