// Очистка формы обратной связи
if(document.querySelector('.contact > form > .error').innerHTML == 'Сообщение успешно отправлено') {
    document.querySelector('.contact > form > .error').style.color = 'green';
    document.querySelector('.contact > form > input[name="name"]').value = '';
    document.querySelector('.contact > form > input[name="email"]').value = '';
    document.querySelector('.contact > form > input[name="age"]').value = '';
    document.querySelector('.contact > form > textarea').value = '';
    setTimeout(() => {
        document.querySelector('.contact > form > .error').innerHTML = '';
    }, 3000);
}