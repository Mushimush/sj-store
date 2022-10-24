// Get the button that opens the modal
var btns = document.querySelectorAll(".modal-open-btn");

let currentModal;
for(let i = 0 ; i < btns.length; i++){
  let btn = btns[i]
  let targetId = btn.getAttribute('data-target')
  let modal =  document.getElementById(targetId) 
  // let modalBody = document.querySelector(`#${targetId} .modal-content`)
  var span = document.querySelector(`#${targetId} .close`)

  // When the user clicks the button, open the modal 
  btn.addEventListener('click', function() {
    if(currentModal){ //make sure only 1 modal is active
      currentModal.style.display = "none";
    }
    modal.style.display = "block";
    currentModal = modal
  })

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
    currentModal = null
  }

}

function triggerModalById(id){
  var btns = document.querySelectorAll(".modal-open-btn");
  for(let i = 0 ; i < btns.length; i++){
      let btn = btns[i]
      let targetId = btn.getAttribute('data-target')
      let modal =  document.getElementById(targetId)       

      modal.style.display = "none";
  }
  let modal =  document.getElementById(id) 
  modal.style.display = "block";
}
