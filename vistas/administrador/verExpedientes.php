<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>== Ver Info defensor ==</title>
      <script src="../../recursos/js/main.js"></script>
      <script src="../../recursos/js/Gestion.js"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/>
</head>
<body>
<div class="x_content">
      <div>
            <center><h3><b> Expedientes del Defensor</b></h3></center>
            <div align="center" >
                  <select  class="myFiltroExp"  name="Filtro" onchange="showExp(this.value)">
                        <option value="">Listar Expedientes por estado</option>
                        <option value="1">Activos</option>
                        <option value="2">Inactivos</option>
                        <option value="3">Todos</option>                                  \
                  </select>
            </div>
      </div>      
            <div class = "left" id = "verExpDef" >
            <center> <h3><b> izquierda</b></h3></center>
            </div>                         
            <div class = "right" id = "verInfoUsuario" >
            <center> <h3><b> derecha</b></h3></center>
            </div>
            
</div>
     
</body>

</html>

