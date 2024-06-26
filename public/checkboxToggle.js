const checkboxToggle = document.querySelector("[data-checkbox-toggle]")
const listCheckboxes = document.querySelectorAll("[data-checkboxes-id]")

checkboxToggle.addEventListener('click', (event) => listCheckboxes.forEach(element => element.checked = event.target.checked), false)
