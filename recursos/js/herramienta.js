function mayusculas(e, elemento) {
  
    tecla=(document.all) ? e.keyCode : e.which; 
     elemento.value = elemento.value.toUpperCase();
    }
    

    function replazarParametro(e,t){res=e;
        for(var n=0;n<t.length;n++){
            res=res.replace(/\{\{(.*?)\}\}/g,function(e,r){
                                             //  console.log(t);
                                               //console.log(r);
                                               //console.log(n);
                                              return t[n][r]})
          }
return res}