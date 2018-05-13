<?php 
  include '../../controlador/juzgado/actividad_juzgado.php';
?>

<script>

function agrega(){
			 $('#menuContainer').load("coordinadorRegistrarJuzgado.php");
      }
      
</script>


     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><label class="control-label col-md-4 col-sm-3 col-xs-12 " >Registro   usuario del servicio</label></h1>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#" id="agregarjuzado" onclick="agrega()">
                            <label  ></label></a>
                        </li>
                   
                        </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form  class="form-horizontal form-label-left" action ="../../controlador/usuario_servicio/crearUsuario.php" object="defensor" method="post">

                        <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                         <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Nombre<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text"   pattern="[A-Za-z ]{3,50}"  required class="form-control text-uppercase" title=":se acepta solo letras y en mayusculas" placeholder="" name="nombre">
                          </div>
                       </div>

                       <div class="form-group  col-md-6 col-sm-6 col-xs-12 ">
                         <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Apellido Paterno<span class="required">*</span></label>
                         </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text" pattern="[A-Za-z]{3,50}"  required class="form-control  text-uppercase" placeholder=" " name="apellido_paterno">
                          </div>
                       </div>

                        <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group">
                        <h4>  <label class="control-label col-md-4 col-sm-3 col-xs-1 " >Apellido Materno<span class="required">*</span></label>
                          </h4><div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text" pattern="[A-Za-z]{3,50}" required class="form-control  text-uppercase" placeholder="" name="apellido_materno">
                           </div>
                       </div> 
                       
                       <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group">
                        <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Telefono<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" pattern="[0-9]{10}" class="form-control " title=": solo numero telefonico" required placeholder="" name="telefono">
                         </div>
                      </div>

                      <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                           <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Email<span class="required">*</span></label>
                            </h4><div class="col-md-8 col-sm-9 col-xs-12">
                              <input type="email" class="form-control" required placeholder="Email" name="email">
                            </div>
                      </div>     

                      <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >calle<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" pattern="[A-Za-z ]{3,50}"  min="5" title=": solo debe contener letras"class="form-control" required placeholder="" name="calle">
                         </div>
                      </div>

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 "> Numero<span class="required">*</span></label>
                        </h4><div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" pattern="[0-9]{1,10}" min="5" title="solo numero con maxicmo 10 digotos" class="form-control" required  placeholder="" name="numero">
                        </div>
                      </div>

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Colonia<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" title=":  solo letras de maximo 50 caracter"pattern="[A-Za-z ]{3,50}" class="form-control  text-uppercase"  required placeholder="" name="colonia">
                        </div>
                      </div>

                  <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Municipio<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" title=":  solo letras de maximo 50 caracter"pattern="[A-Za-z ]{3,50}" class="form-control  text-uppercase"  required placeholder="" name="municipio">
                        </div>
                      </div>

                     <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Curp<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" title=": el formato debe ser alfanumerico con 18 digitos" pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"class="form-control  text-uppercase"  required placeholder="curp" name="curp">
                        </div>
                      </div>


               

                        <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">Estado</label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <select name="estado"  class="select2_group form-control">
                              <option value="Aguascalientes">          Aguascalientes</option>
                              <option value="Baja California">          Baja California</option>
                              <option value="Campeche">          Campeche</option>
                              <option value="Chihuahua">          Chihuahua</option> 
                              <option value="Chiapas">          Chiapas</option>
                              <option value="Coahuila">          Coahuila</option>              
                              <option value="Colima">          Colima</option>           
                              <option value="Durango">          Durango</option>          
                              <option value="Guanajuato">          Guanajuato</option>         
                              <option value="Guerrero">          Guerrero</option>         
                              <option value="Hidalgo">          Hidalgo</option>   
                              <option value="Jalisco">          Jalisco</option>   
                              <option value="México">          México</option>  
                              <option value="Michoacán">          Michoacán</option>  
                              <option value="Morelos">          Morelos</option>  
                              <option value="Nayarit">          Nayarit</option>  
                              <option value="Nuevo León">          Nuevo León</option>  
                              <option value="Oaxaca">          Oaxaca</option>  
                              <option value="Puebla">          Puebla</option>  
                              <option value="Querétaro">          Querétaro</option>  
                              <option value="Quintana Roo">          Quintana Roo</option>  
                              <option value="San Luis Potosí">          San Luis Potosí</option>
                              <option value="Sinaloa">          Sinaloa</option>
                              <option value="Sonora">          Sonora</option>
                              <option value="Tabasco">          Tabasco</option> 
                              <option value="Tamaulipas">          Tamaulipas</option>
                              <option value="Tlaxcala">          Tlaxcala</option>
                              <option value="Veracruz">          Veracruz</option>
                              <option value="Yucatán">          Yucatán</option>  
                              <option value="Zacatecas">          Zacatecas</option>

                           
                          </select>
                        </div>
                      </div>
                     
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Edad<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" title=": solo numero mayor a 14 no maxicmo a 100 años" pattern="(1(00|[5-9])|([2-9]([0|1-9])))"class="form-control "  required placeholder="" name="edad">
                        </div>
                      </div>
                      

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">Etnia</label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                       <input type="text" title=":  solo letras de maximo 50 caracter"pattern="[A-Za-z ]{3,50}" class="form-control  text-uppercase"  required placeholder="" name="etnia">
                        </div>
                      </div>
                                      
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">Idioma</label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
<!--                           <select name="idioma"  class="select2_group form-control">
                             <option value="zapoteco">zapoteco</option> 
                             <option value="zapoteco 2">zapoteco 2</option>   
                          </select>
 -->                         <input type="text" title=":  solo letras de maximo 50 caracter"pattern="[A-Za-z ]{3,50}" class="form-control  text-uppercase"  required placeholder="" name="idioma">
                         </div>
                      </div>
                    
                     
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Genero<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-8 col-xs-12">
                          <div id="genero" required class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input name="genero"   required value="masculino" data-parsley-multiple="gender" type="radio"> masculino
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input name="genero"    required value="femenino" data-parsley-multiple="gender" type="radio"> femenino
                            </label>
                          </div>
                        </div>
                      </div>

               


                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						   <button class="btn btn-primary btn btn-info btn-lg" type="reset">Limpiar</button>
						   <input type ="submit" class="btn btn-succes btn btn-success btn-lg" value="Guardar"/>
                        <!--   <button type="submit" class="btn btn-success">Submit</button> -->
                        </div>
                      </div>

                    </form>
                  </div>
                </div>

