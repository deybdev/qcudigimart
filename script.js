// 
let subMenu = document.getElementById("sub-menu");
    let arrowIcon = document.getElementById("arrow-icon");

    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
        arrowIcon.classList.toggle("arrow-up");
    }

// 
function revealFunction() {
        
    window.sr = ScrollReveal({
        duration: 1150,
        distance: '100px',
        easing: 'ease-out',
        reset: true 
    });

    
    sr.reveal('.content', { origin: 'left' });
    sr.reveal('.img1', { origin: 'top' });
    sr.reveal('.img2', { origin: 'bottom' });
}

window.addEventListener('load', () => {
    revealFunction();
});

//
function toggleBar() {
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('active');
}