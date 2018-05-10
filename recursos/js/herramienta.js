function mayusculas(e, elemento) {
  
    tecla=(document.all) ? e.keyCode : e.which; 
     elemento.value = elemento.value.toUpperCase();
    }
    