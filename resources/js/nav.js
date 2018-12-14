document.addEventListener('DOMContentLoaded',  ()=> {
    const navLinks = [ ...document.querySelectorAll('.nav-link')]
    const currentUrl = window.location.pathname

    const makeActive = (link) => {
        link.href.includes( currentUrl ) && link.classList.add('active')
    }

    navLinks.forEach(makeActive)


})
