let modal;

document.addEventListener('DOMContentLoaded', () => {
  modal = new GraphModal();

  let send_request_buttons = document.querySelectorAll('.js-send-request');
  send_request_buttons.forEach((send_request_button) => {

    if (send_request_button){
      send_request_button.addEventListener('click', () => {
        modal.open('send-request');
      });
    }
  });
  
});
