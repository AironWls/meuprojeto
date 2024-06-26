import { settings } from "./settings.js"

const btnAction = document.querySelector("#btnAction")

btnAction.addEventListener('click', destroySelected, false)

function destroySelected(event)
{
    event.preventDefault()
    const action = document.querySelector("#action")
    if ( action.value === "" ) {
        alert("Selecione uma ação, por gentileza!")
        return
    }

    const listCheckboxesMarked = new Array()
    listCheckboxes.forEach(element => {
        if (element.checked)
            listCheckboxesMarked.push(element.getAttribute('data-checkboxes-id'))
    })
    if ( listCheckboxesMarked.length === 0 ) {
        alert("Selecione ao menos um valor, por gentileza!")
        return
    }

    deleteSelected(listCheckboxesMarked)

}

async function deleteSelected(checkboxesMarked) {

    let h = new Headers()
    h.append("Content-Type", "application/json")
    h.append("Accept", "application/json")
    h.append("X-CSRF-TOKEN", settings.token)

    let response = await fetch(`${settings.urlCurrent}/destroySelected`,
    {
        method: 'DELETE',
        headers: h,
        body: JSON.stringify({id: checkboxesMarked})
    })
    window.location.href = settings.urlCurrent
}
