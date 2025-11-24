let autoRotateInterval;

function startAutoRotate() {
    autoRotateInterval = setInterval(() => {
        gsap.to('.ring', {
            rotationY: '+=36', 
            onUpdate: () => {
                gsap.set('.img', { backgroundPosition: i => getBgPos(i) });
            },
            duration: 1.2 
        });
    }, 1000); 
}

gsap.timeline().
set('.ring', { rotationY: 180 }) 
.set('.img', { 
    rotateY: i => i * -36,
    transformOrigin: '50% 50% 500px',
    z: -500,
    backgroundPosition: i => getBgPos(i),
    backfaceVisibility: 'hidden'
}).
from('.img', {
    duration: 1.5,
    y: 200,
    opacity: 0,
    stagger: 0.1,
    ease: 'expo'
});

startAutoRotate();

function getBgPos(i) {
    return 100 - gsap.utils.wrap(0, 360, gsap.getProperty('.ring', 'rotationY') - 180 - i * 36) / 360 * 500 + 'px 0px';
}

document.querySelectorAll(".login-button").forEach((button) => {
    button.onclick = function() {
        window.location.href = "http://localhost/Web%20Application%20Programming/php/loginPage.php";
    };
});

document.querySelectorAll(".sign-in-button").forEach((button) => {
    button.onclick = function() {
        window.location.href = "http://localhost/Web%20Application%20Programming/php/signinPage.php";
    };
});
