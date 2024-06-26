export const settings = {
    token: document.querySelector("meta[name='csrf-token']").getAttribute('content'),
    urlCurrent: document.querySelector("base").getAttribute('href')
}
