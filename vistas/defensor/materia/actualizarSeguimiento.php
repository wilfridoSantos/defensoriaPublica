<?php
 //include_once( '../../controlador/juzgado/actividad_juzgado.php');
 //include_once( '../../controlador/defensor/controladorListaDef.php');

 session_start();
// print_r($_SESSION['personal']);
  $id_personal = $_SESSION['personal'][0]['id_personal'];
  $nombre = $_SESSION['personal'][0]['nombre'];
  //echo $id_personal;
  //echo $nombre;

 
?>

<!-- page content -->


            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                     
                      
                      <div class="row">
                        <div class="col-xs-12 table">
                          
                        <button type="button" onclick="modolSeguimiento()">detallado</button>
                          <div id="respuestaPregunta">
                            
                          </div>
                         <!--  <div id="rrellenarPregunta">
                            
                          </div> -->
                          <form  id="rrellenarPregunta"  data-toggle="validator"enctype="multipart/form-data" role="form" class="" action ="../../controlador/expediente/seguimientoExpediente.php" object="defensor" method="post">
                          
                          </form> 
                          


                        </div>
                       
                      </div>
                      

                      <!-- FIN DE LO OTRO INIICIO PARA EDITAR CONTRAPARTE -->

                     <div class="modal fade" id="modalDetalladoExpediente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <div id="miEditarUsuarioDetallado" class="table-responsive x_content" title="infomación">
                                 
                                  
                                    
                                          </div>
                                         
                                          <div  id="detalladoSeguimiento">
                                          <h5 class="modal-title" id="exampleModalCenterTitle">expediente:<span id="detalleExpediente"></span></h5>
                                      </div>
                                      <div  id="botonImprimir">
                                      
                                      </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                              </div>
                            </div>
                          </div>
                    </div> 
                          <!-- <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                         -->      
                   
                    </section>
                  </div>
                </div>
              </div>
            </div>
         


    

<!-- <script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script> -->
  <!--   <script src="../../recursos/js/custom.min.js"></script> -->
    <script src="../../recursos/js/curp.js"></script>
    <script src="../../recursos/js/jquery-validator.js"></script>
    <script src="../../recursos/js/defensor/atendiendoExpediente.js"></script>
    <script src="../../recursos/js/expediente/actualizacionSeguimiento.js"></script>
    
    <script>

$('#myform').validator()
$('#myubicacion').hide()
$('#personal').hide()
$('#mycomprobante').hide()

$('#resultado').keyup(validateTextarea);

function validateTextarea() {
    var errorMsg = "Please match the format requested.";
    var textarea = this;
    var pattern = new RegExp('^' + $(textarea).attr('pattern') + '$');
    // check each line of text
    $.each($(this).val().split("\n"), function () {
        // check if the line matches the pattern
        var hasError = !this.match(pattern);
        if (typeof textarea.setCustomValidity === 'function') {
            textarea.setCustomValidity(hasError ? errorMsg : '');
        } else {
            // Not supported by the browser, fallback to manual error display...
            $(textarea).toggleClass('error', !!hasError);
            $(textarea).toggleClass('ok', !hasError);
            if (hasError) {
                $(textarea).attr('title', errorMsg);
            } else {
                $(textarea).removeAttr('title');
            }
        }
        return !hasError;
    });
}
</script>