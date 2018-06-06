<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!--Abriendo ventanas con CSS por MIALTO @_mialto_-->
    <title>Abriendo ventanas</title>
    <style>
    .abrir{
        margin: 10px;
        padding:5px;
        background-color: #F0AB00;
        cursor:pointer;
    }
    .abrir:hover{
        background-color: #F5DC60;
    }
    .cerrar{
        float:right;
        margin: 5px;
        height:22px;
        width:22px;
        color:#ffffff;
        background-color: #ff0000;
        text-align:center;
        cursor:pointer;
    }
    .ventana{
        border: 2px solid #666666;
        position: absolute;
        width: 300px;
        visibility: hidden;
        border-radius: 5px;
        box-shadow: 10px 10px 10px #111;
        padding: 10px;
    }
    #ventana1{
        z-index: 10;
        right: 50%;
        top: 10%;
        background-color: rgba(256,256,256,0.98);
    }
    </style>
</head>
<body>
    <h2>Abriendo ventanas CSS</h2>
    You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man.<br><br>
    <span class="abrir" onclick="document.getElementById('ventana1').style.visibility='visible'">Abrir ventana</span>
    <div class="ventana" id="ventana1">
        <span class="cerrar" onclick="document.getElementById('ventana1').style.visibility='hidden'">x</span>
        <h3>Esto es la ventana</h3>
        Aquí podemos introducir todo cuanto queramos, desde formularios a imágenes, sliders...
    </div>
 
</body>
</html>