document.getElementById('product-form').addEventListener('submit', function(event) {
    event.preventDefault();
  
    // Obtener los valores del formulario
    const name = document.getElementById('name').value;
    const price = document.getElementById('price').value;
    const description = document.getElementById('description').value;
  
    // Crear un objeto FormData para enviar los datos al servidor
    const formData = new FormData();
    formData.append('name', name);
    formData.append('price', price);
    formData.append('description', description);
  
    // Realizar la solicitud AJAX al servidor PHP
    fetch('agregar_producto.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      // Manejar la respuesta del servidor
      if (data.success) {
        alert('El producto se agregó correctamente.');
        // Actualizar la lista de productos en la página
        // ...
      } else {
        alert('Ocurrió un error al agregar el producto.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
  