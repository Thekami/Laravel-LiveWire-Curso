import './bootstrap';

$(document).ready(function() {
  $('.opciones-tabla').tooltip();
})

window.addEventListener('confirm', event =>{
    
  Swal.fire({
      title: event.detail.titulo,
      text: event.detail.mensaje,
      icon: event.detail.icon,
      showDenyButton: true,
      showConfirmButton: true,
      confirmButtonText: 'Eliminar', 
      denyButtonText: 'No eliminar',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      toast: false
  }).then((result) =>{
    if(result.isConfirmed){
      Livewire.emit('delete', event.detail.id);
    }

  })

})

window.addEventListener('alert', event =>{
  Swal.fire({
    title: event.detail.titulo,
    text: event.detail.mensaje,
    icon: event.detail.icono,
    toast: false
  });
})

