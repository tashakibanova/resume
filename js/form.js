const TELEGRAM_BOT_TOKEN = '7085109529:AAFcIJXMIfeBVTYmPjBRGxHk1EXohwcKdUo';
const TELEGRAM_CHAT_ID = '@MySiteForm';
const API = `https://api.telegram.org/bot${TELEGRAM_BOT_TOKEN}/sendMessage`

async function sendEmailTelegram(event) {
    event.preventDefault(); //отключаем перезагрузку страницы при отправке
    
    const form = event.target;
    const formButton = document.getElementById('form__submit-button')
    const formSendResult = document.querySelector('.form__send-result')
    formSendResult.textContent = '';

    //собираем данные из формы
    const { name, telegram, message } = Object.fromEntries(new FormData(form).entries());
    const text = `Заявка от ${name}\nTelegram: ${telegram}\nСообщение: ${message}`;

    //отправка сообщения
    try {
        const response = await fetch(API, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json;'
            },
            body: JSON.stringify({
                chat_id: TELEGRAM_CHAT_ID,
                text,    
            })
        })

        if (response.ok) {
            formSendResult.textContent = 'Если форма работает (а она работает), то я обязательно свяжусь с вами! Или вы можете сделать это самостоятельно по кнопкам ниже:';
            form.reset()  
        } else {
            throw new Error(response.statusText);
        }
    } catch (error) {
        console.error(error);
        formSendResult.textContent = 'Упс, форма не отправлена, но я над этим уже работаю! А пока можешь написать мне по ссылкам ниже:';
    } 
}