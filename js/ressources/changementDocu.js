const elem = document.querySelector('#buttonPage > p')
const boutonD = document.querySelector('#flecheD')
const boutonG = document.querySelector('#flecheG')

let count = 1

elem.textContent = `Page ${count} sur 3`

boutonD.addEventListener('click', compteurBtnD)

function compteurBtnD() {

    if(count < 3){
        count += 1
    }

    elem.textContent = `Page ${count} sur 3`
    return count
}

boutonG.addEventListener('click', compteurBtnG)

function compteurBtnG() {
    if(count > 0){
        count -= 1
    }
    elem.textContent = `Page ${count} sur 3`
    return count
}