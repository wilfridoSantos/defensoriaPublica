<?php 
session_start();
?>
<meta http-equiv="Contet-Type" name="" content="text/html; charset=iso-8859-1">
<script type='text/javascript'>
   console.log("hola en este freme");
     
</script>
 <script  type="text/javascript"  src="../../recursos/js/jquery-1.11.2.min.js"></script> 
    <!-- Bootstrap -->
    <link href="../../recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="../../recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- NProgress -->
    <link href="../../recursos/vendors/nprogress/nprogress.css" rel="stylesheet"/>
    <!-- iCheck -->
    <link href="../../recursos/vendors/iCheck/skins/flat/green.css" rel="stylesheet"/>
    <!-- Datatables -->
    <link href="../../recursos/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"/>
    <script src="../../recursos/js/main.js"></script>
      <script src="../../recursos/js/jquery-ui.1.12.1.js"></script>
      <!-- <script  type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
       --><link href="../../recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="../../recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    
    <script src="../../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
 <style>
               .embed-container {
                    position: relative;
                    padding-bottom: 56.25%;
                    height: 0;
                    overflow: hidden;
                }
                .embed-container iframe {
                    position: absolute;
                    top:0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                }
                .mi-iframe {
                  width: 250px;
                  height: 50px;
                }

                /* CSS pantallas de 320px o superior */
                @media (min-width: 320px) {

                  .mi-iframe {
                    width: 300px;
                    height: 150px;
                  } 

                }

                /* CSS pantalla 768px o superior */
                @media (min-width: 768px) {

                  .mi-iframe {
                    width: 500px;
                    height: 250px;
                  } 

                }
               </style>
    <!-- Custom Theme Style -->
 <!--    <link href="../../recursos/css/custom.css" rel="stylesheet"/>
  -->
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><label class="control-label col-md-6 col-sm-3 col-xs-12 " >Registro de Estudio</label></h1>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                   <!--  <form enctype="multipart/form-data" id="myform" method="post"> -->
                    <form  enctype="multipart/form-data" autocomplete="off" id="myform"  name="formEstudio" data-toggle="validator" role="form" class=""  object="defensor" >

                     
                      <div id="divExpediente" class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Perfil estudio<span class="">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input required  onkeyup="mayusculas(event, this)" type="text"  name="perfil" id="perfil" data-error="se requiere del perfil" class="form-control col-md-7 col-xs-12">
                          <div  class="help-block with-errors"></div> </div>
                      </div></div>

                
                       

                        <div id="gradoDelito" class="form-horizontal form-label-left"> <div   class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Instituto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input required type="text" pattern="[A-Za-z. ]+"  onkeyup="mayusculas(event, this)"   name="instituto" id="instituto" data-error="Solo letras"   class="form-control col-md-7 col-xs-12">
                       
                          </div></div> </div>
                          
                        <div id="gradoDelito" class="form-horizontal form-label-left"> <div   class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripcion del perfil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea rows="" cols="" required pattern="[A-Za-z. ]+"  onkeyup="mayusculas(event, this)" name="descripcion_perfil_egreso" id="descripcion_perfil" data-error="Solo letras"  class="form-control col-md-7 col-xs-12"></textarea>
                        
                         </select>
                          </div></div> </div>
                        
                          <div id="gradoDelito" class="form-horizontal form-label-left"> <div   class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Especialidad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input required type="text" pattern="[A-Za-z. ]+"  onkeyup="mayusculas(event, this)"   name="especialidad" id="especialidad" data-error="Solo letras"   class="form-control col-md-7 col-xs-12">
                       
                          </div></div> </div>
                       
                         <div class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="delito">Grado de estudio<span class="">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select required="" id="grado_estudio"   name="grado_escolaridad"  class="form-control ">
                            <option value="">--SELECCIONE UNA OPCIÓN-</option>
                            <option value="MAESTRIA">MAESTRIA</option>
                            <option value="DOCTORADO">DOCTORADO</option>
                            <option value="LICENCIATURA">LICENCIATURA</option>
                            
                            
                          </select>  <div  class="help-block with-errors"></div>  </div>
                      </div></div>

                     <!--  <div class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="delito">Especialidad<span class="">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input required type="text" pattern="[A-Za-z ]+"  onkeyup="mayusculas(event, this)"   name="instituto" id="especiad" data-error="Solo letras"   class="form-control col-md-7 col-xs-12">
                          <div  class="help-block with-errors"></div>  </div>
                      </div></div>
 -->
                      <div class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="delito">Fecha de termino<span class="">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input required type="date"    name="fecha_termino" id="fecha_termino" data-error="Se requiere de una fecha"   class="form-control col-md-7 col-xs-12">
                          <div  class="help-block with-errors"></div>  </div>
                      </div></div>

                      <div class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="delito">Documento provatorio<span class="">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input required type="file"    name="documento_provatorio" id="documento_provatorio"    class="form-control col-md-7 col-xs-12">
                          <div  class="help-block with-errors"></div>  </div>
                      </div></div>
                       

               
                          <input type="text" name="usuarios" id="usuarios"   style="display:none;" class="form-control col-md-7 col-xs-12"/>
                          <input type="text" name="id_personal" id="id_personal" style="display:none;" value="<?php  echo $_SESSION['personal'][0]["id_personal"]?>"  class="form-control col-md-7 col-xs-12"/>
                          <input type="text" name="tipoSistema" id="tipoSistema" style="display:none;" value="<?php  echo $_SESSION['personal'][0]["sistema"]?>"  class="form-control col-md-7 col-xs-12"/>
                          <input type="text" name="tipoMateria" id="tipoMateria" style="display:none;" value="<?php  echo $_SESSION['personal'][0]["materia"]?>"  class="form-control col-md-7 col-xs-12"/>
              
                      
                     
                    

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                         
						   <input id="enviarFormEstudio" type ="button" class="btn btn-succes btn btn-success btn-lg" onclick="registroEscolaridad(event,this)" value="Registrar"/>
                        <!--   <button type="submit" class="btn btn-success">Submit</button> -->
                        </div>
                      </div>
                      </div>

                    </form>
                  </div>
                </div>
    <script src="../../recursos/js/jquery-validator.js"></script>
    <script src="../../recursos/js/defensor/gestionEscolaridad.js"></script>
 
    <script>

//$('#myform').validator()
</script>

<div id="contenedorMensaje"  class='alert-dismissible fade in <?php echo $alert; ?>'  role="alert">
                     
                     

                  </div>