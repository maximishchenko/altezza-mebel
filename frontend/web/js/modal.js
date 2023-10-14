let modal;

document.addEventListener('DOMContentLoaded', () => {
  modal = new GraphModal();

  let send_request_button = document.querySelector('.js-send-request');
  if (send_request_button){
    send_request_button.addEventListener('click', () => {
      modal.open('send-request');
    });
  }
  
});
