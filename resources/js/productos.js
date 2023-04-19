
$(document).ready(function() {
  $('.select2').select2();
})

$(document).on('change', '.select2', function(e){
  //@this.set('categoria',$(this).val())
  livewire.emit('categoriaChanged', $(this).val());

});
