
let modalWindowOpen = document.querySelectorAll('.registerButton');
let modalWindowClose =  document.getElementById("closeButton");
let popupMessage = document.querySelector('.showcard')

for(let i=0; i <= modalWindowOpen.length; i++) {
    modalWindowOpen[i].addEventListener('click', () => {
        popupMessage.style.visibility = 'visible'
    })

    modalWindowClose.addEventListener('click', () => {
        popupMessage.style.visibility = 'hidden'
    })
}
