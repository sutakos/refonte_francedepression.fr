const onHover = (event) => {
    document.querySelectorAll('blocImg').forEach(function (bloc) {
        if(event.currentTarget === bloc){
            event.currentTarget.classList.add('hover')
        }
        else {
            bloc.classList.remove('hover')
        }
    })
}
document.querySelectorAll('blocImg').forEach(bloc => {
    bloc.addEventListener('mouseover', onHover)
})