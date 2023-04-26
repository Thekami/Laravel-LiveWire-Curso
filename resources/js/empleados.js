$(document).ready(function() {
  $('.opciones-tabla').tooltip();
})

window.addEventListener('display-modal-edit', event =>{
  $('#exampleModalToggle').modal('show');
})

window.addEventListener('close-modal-edit', event =>{
  $('#exampleModalToggle').modal('hide');
  $('#form-edit').trigger("reset");
  livewire.emit('reloadComponent');
  Swal.fire({
    title: event.detail.title,
    text: event.detail.text,
    icon: event.detail.icon,
    toast: false
  });
})

