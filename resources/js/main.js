
  // function SweetAlert

  var SweetAlert = function(title, text, icon, button){
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonText: button,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        toast: false
    })
  
    // icon = success, error, warning, info, question
  };
