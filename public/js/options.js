// Генератор токена
const genToken = () => {
    let el = 0
    let symbols = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM'
    let token = ''
    for (let i = 0; i < 6; i++) {
        el = Math.floor(Math.random() * 61)
        token = token + symbols.slice(el, el + 1)
    }
    
    document.querySelector('input[name="token"]').value = token;
}

// Копирование ссылки
const copyLink = (e) => {
    let temp_input = document.createElement("input");
    let link = document.querySelector(`a[href='/link/${e}'`);

    temp_input.value = link;
    document.body.appendChild(temp_input);
    temp_input.select();
    document.execCommand("copy");
    document.body.removeChild(temp_input);

    console.log("Ссылка скопирована в буфер обмена");
    console.log(link.innerHTML);
}