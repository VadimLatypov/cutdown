// Анимация 404
window.onload = () => {
    setTimeout(() => {
        document.querySelector('.col-1').style.top = '100px';
        document.querySelector('.col-1-1').style.top = '100px';
    }, 500);
    setTimeout(() => {
        document.querySelector('.col-2').style.top = '200px';
    }, 750);
    setTimeout(() => {
        document.querySelector('.col-3.el2').style.top = '200px';
        document.querySelector('.col-4.el2').style.top = '200px';
    }, 1000);
    setTimeout(() => {
        document.querySelector('.col-3.el1').style.top = '50px';
        document.querySelector('.col-4.el1').style.top = '50px';
        document.querySelector('.col-5').style.left = '-4px';
    }, 1250);
    setTimeout(() => {
        document.querySelector('.col-5').style.top = '200px';
    }, 1500);
    setTimeout(() => {
        document.querySelector('.col-6').style.top = '100px';
        document.querySelector('.col-6-1').style.top = '100px';
    }, 1750)
    setTimeout(() => {
        document.querySelector('.col-7').style.top = '200px';
    }, 2000)
};
