const getSearchResults = async (search) => {

    let infoToSearch = ''

    search = search.replace(/\s+/g, "_")

    let jsonSearch = {
        'action': 'query',
        'list': 'search',
        'srsearch': search,
        'format': 'json',
        'origin': '*'
    }

    infoToSearch = Object.entries(jsonSearch).map(([key, value]) => `${key}=${value}`).join('&')
    let response = await sendToApi(infoToSearch)

    if (response != false) {
        printAllResults(response.query.search)
        addToHistory(search)
    }
}

const sendToApi = async (infoToSearch) => {
    let endpoint = 'https://en.wikipedia.org/w/api.php?'
    const url = endpoint + infoToSearch

    try {
        let response = await fetch(url).then(res => {
            return res.json()
        })
        return response
    } catch (error) {
        console.error('Error al hacer la consulta a la API:', error)
        return false
    }
}

const printAllResults = (results) => {
    let div = document.getElementById('result')
    div.innerHTML = ""

    results.forEach((result) => {
        let divChild = document.createElement('div')
        divChild.classList.add('card')

        let a = document.createElement('a')
        a.classList.add('card-title')

        let text = document.createTextNode(result.title)

        a.appendChild(text)
        divChild.appendChild(a)

        div.appendChild(divChild)
    })
}

const addToHistory = (search) => {

}

document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById('form')

    form.addEventListener('submit', (e) => {
        e.preventDefault()

        let search = e.target.querySelector('[name="search"]').value

        if (search != '') {
            getSearchResults(search)
        } else {
            let div = document.getElementById('result')
            div.innerHTML = ""
        }
    })
})
