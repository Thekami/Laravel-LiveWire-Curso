// Escucha un evento ejecutado desde el controlador del componente (EventosComponent)
Livewire.on('success', () => {
  SweetAlert("Forma 1", "Esta es una forma de escuchar un evento", "success", "Ok");
})

// Otra forma de escuchar un evento que fue ejecutado desde el controlador del componente (EventosComponent)
window.addEventListener('success2', event => {
  Swal.fire({
    title: event.detail.title,
    text: event.detail.text,
    icon: event.detail.icon,
    toast: false
  });
})

window.addEventListener('show-modal', event => {
  $('#myModal').modal('show');
})

// Livewire.on('show-modal', () => {
//   $('#myModal').modal('show');
// })


