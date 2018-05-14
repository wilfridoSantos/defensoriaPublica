<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>ACTUALIZAR DEFENSOR</title>
<script async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../recursos/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../recursos/vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../../recursos/vendors/validator/validator.js"></script>
 -->
    <!-- Custom Theme Scripts -->
    <script src="../../recursos/js/custom.min.js"></script>
    <script src="../../recursos/js/jquery-validator.js"></script>

</head>
<body >
<script>
function agrega(){
			 $('#menuContainer').load("coordinadorRegistrarJuzgado.html");
			 }
</script>
             <div class="row" id="menuContainer">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                               
                  <div class="x_title"> ACTUALIZAR INFORMACION DEFENSOR                                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" >
                    
                  <form  data-toggle="validator" role="form" class="form-horizontal form-label-left"
                    action ="../../controlador/defensor/controlActualizarDef.php" 
                    method="post" id="updateDefensor" enctype="multipart/form-data">
                  
                  </form>

                  </div>
                </div>
              </div>
</body>
</html>

<script>
$('#updateDefensor').validator()
/* ar validator = new FormValidator('example_form', [{
  /*   name: 'req',
    display: 'required',
    rules: 'required'
}, {
    name: 'alphanumeric',
    rules: 'alpha_numeric'
}, {
    name: 'password',
    rules: 'required'
}, {
    name: 'password_confirm',
    display: 'password confirmation',
    rules: 'required|matches[password]'
},  {
    name: 'email',
    rules: 'valid_email',
    depends: function() {
        return Math.random() > .5;
    }
}, {
    name: 'minlength',
    display: 'min length',
    rules: 'min_length[8]'
}], function(errors, event) {
    if (errors.length > 0) {
        // Show the errors
    }
});

 */

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');

</script>
