<?php
     include_once( '../../controlador/defensor/controladorListaDef.php');
?>
 <script src="../../recursos/js/jquery-ui.1.12.1.js"></script>
 
     <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h3><label class="control-label col-md-12 col-sm-3 col-xs-12 " >baja de expediente</label></h3>                    
            
                </div>
                <div class="x_content">                    
                    <form  class="" action ="../../controlador/expediente/bajaExpediente.php" object="defensor" method="post">
                        <div class="form-horizontal form-label-left">                     
                        <div class="col-md-6 col-xs-12">
                              <label>Causa
                                <select id="causa" class="form-control" name="causa" onchange="validarSelect(this.value)">
                                    <option value="">Materia</option>
                                    <option value="REVOCACION">Revocación del defensor</option>
                                    <option value="FALTA">Falta de interés</option>     

                                </select>
                              </label>
                               <div id="mensajeSelectCausa" style="color:red;"></div>
                            </div> 
                            <br/>
                            <div id="selectMotivacion" class="col-md-7 col-xs-12">
                              
                            </div> 
                            
                           
                            <input type="text" name="expedienteNum" id="expedienteNum" value="<?php echo $_GET['id_exp'] ?>"  style="display:none;" class="form-control col-sm-2 col-xs-12"/>                       
                        </div>
                
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						            <input id="botonBajaExp" disabled name="botonBajaExp" type ="submit" class="btn btn-succes btn btn-success btn-lg" value="Dar de baja"/>                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                

