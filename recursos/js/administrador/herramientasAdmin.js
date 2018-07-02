


function dataDefensor(){
    var dataDefensores;
    $.ajax({
      type: 'GET',
      url: '../../controlador/defensor/controladorListaDef.php?term=busqueda',
      success: function (data) {
        
         dataDefensores= data;//parsedData[0].NUMERO;
         console.log('data en herramientas js ', dataDefensores );
      },
      error: function () {
          alert('Error peticion Ajax ');
      }
      });
      return dataDefensores;
}
