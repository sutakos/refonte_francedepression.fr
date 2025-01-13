const elem = document.querySelector('#buttonPage > p')
const boutonD = document.querySelector('#flecheD')
const boutonG = document.querySelector('#flecheG')
const boutonDoubleD = document.querySelector('#doubleFlecheD')
const boutonDoubleG = document.querySelector('#doubleFlecheG')

let count = 1 // valeur initiale
const max = 3 // permet de changer le nombre maximum de pages sans tout modifier un par un

elem.textContent = `Page ${count} sur ${max}`

boutonD.addEventListener('click', compteurBtnD)

function compteurBtnD() {

    if(count < max){
        count += 1
    }

    elem.textContent = `Page ${count} sur ${max}`
    return count
}

boutonG.addEventListener('click', compteurBtnG)

function compteurBtnG() {
    if(count > 1){
        count -= 1
    }
    elem.textContent = `Page ${count} sur ${max}`
    return count
}

boutonDoubleD.addEventListener('click',()=>{
    elem.textContent = `Page ${max} sur ${max}`
})

boutonDoubleG.addEventListener('click',()=>{
    elem.textContent = `Page 1 sur ${max}`
})
