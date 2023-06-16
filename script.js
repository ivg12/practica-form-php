document.querySelector('form').addEventListener('submit', function(event) {
  event.preventDefault(); // Evita el envío del formulario por defecto
  
  let nombre = document.querySelector('input[name="nombre"]').value;
  let apellido = document.querySelector('input[name="apellido"]').value;
  let email = document.querySelector('input[name="email"]').value;

  if (nombre.trim() === '' || apellido.trim() === '' || email.trim() === '') {
    alert('Por favor, completa todos los campos.'); // Muestra un mensaje de error si algún campo está vacío
  } else {
    alert('El formulario ha sido enviado.'); 
    document.querySelector('form').reset();
  }
});
