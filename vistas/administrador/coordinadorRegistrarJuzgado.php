<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Insert title here</title>
</head>

<script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
<script src="../../recursos/js/herramienta.js"></script>
<body>
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registro de juzgado</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="../../controlador/juzgado/registrar_juzgado.php?" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  pattern="[A-Za-z ]{1,30}" onkeyup="mayusculas(event, this)" onblur="mayusculas(event, this)" id="nombre_juzgado" required name="juzgado" class="form-control  has-feedback-left col-md-7 col-xs-12">
                             <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                  

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Region <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="region"  class="form-control ">
                            <option >Valles Centrales</option>
                            <option> Cañada</option>
                            <option> Costa</option>
                            <option> Istmo</option>
                            <option> Mixteca</option>
                            <option> Papaloapan</option> 
                            <option> Sierra Norte</option>
                            <option> Sierra Sur</option>
                            
                          </select>
                          </div></div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Calle</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="calle_juzgado" type="text" required pattern="[A-Z]{3,50}" onkeyup="mayusculas(event, this)" onblur="mayusculas(event, this)"  class="form-control has-feedback-left col-md-7 col-xs-12"  name="calle">
                             <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>  
                   
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="numero_juzgado" title=":solo numeros entero con maximo 10 digito" name="numero" class="date-picker has-feedback-left form-control col-md-7 col-xs-12"  type="text" required pattern="[1-9]{1,10}">
                           <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Colonia <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="colonia_juzgado" name="colonia" pattern="[A-Za-z ]{3,50}"required onkeyup="mayusculas(event, this)" onblur="mayusculas(event, this)"  class="date-picker has-feedback-left form-control col-md-7 col-xs-12"  type="text">
                         <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Municipio <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="municipio_juzgado" pattern="[A-Za-z ]{3,50}" required onkeyup="mayusculas(event, this)" onblur="mayusculas(event, this)"  name="municipio" class="date-picker form-control has-feedback-left col-md-7 col-xs-12"  type="text">
                          <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button class="btn btn-primary btn btn-info btn-lg" type="reset">Limpiar</button>

                   
                     <!--     <a id="crea_juzgado" class="btn btn-succes btn btn-success btn-lg">Registrar</a>
                     -->     <button id="" class="btn btn-succes btn btn-success btn-lg">Guardar</button>

                        </div>
                      </div>

                    </form>
                    <h6>
                   </h6>
                  </div>
                </div>
              </div>
            </div>

     

  
</body>
</html>