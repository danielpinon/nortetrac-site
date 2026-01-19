<!DOCTYPE html>
<html>
  <head>
  <title>HTML5 multi-touch</title>

  <script type="text/javascript" src="https://nortetrac.com.br/js/jquery.min.js"></script>
  <script type='text/javascript'>
    var canvas;
    var larCanvas = 0;
    var AltCanvas = 0;
    var ctx;
    var flag = false;
    var prevX = 0;
    var currX = 0;
    var prevY = 0;
    var currY = 0;
    var dot_flag = false;
    var x = "black";
    var larLinha = 3;

    var lastPt = new Object();
    var colours = ['red', 'green', 'blue', 'yellow', 'black'];
  
    function init() {

        var touchzone = document.getElementById("mycanvas");
        touchzone.addEventListener("touchmove", drawMobile, false);
        touchzone.addEventListener("touchend", end, false);   

        canvas = document.getElementById('mycanvas');
        larCanvas = canvas.width;
        AltCanvas = canvas.height;

        canvas.addEventListener("mousemove", function (e) {
            findxy('move', e)
        }, false);
        canvas.addEventListener("mousedown", function (e) {
            findxy('down', e)
        }, false);
        canvas.addEventListener("mouseup", function (e) {
            findxy('up', e)
        }, false);
        canvas.addEventListener("mouseout", function (e) {
            findxy('out', e)
        }, false);

        ctx = canvas.getContext("2d");

    }
 
    function drawMobile(e) {

        e.preventDefault();

        //Iterate over all touches
        for(var i=0;i<e.touches.length;i++) {
        
            var id = e.touches[i].identifier;   
        
            if(lastPt[id]) {
                ctx.beginPath();
                ctx.moveTo(lastPt[id].x, lastPt[id].y);
                ctx.lineTo(e.touches[i].pageX, e.touches[i].pageY);
                ctx.strokeStyle = x;//colours[id];
                ctx.lineWidth = larLinha;
                ctx.stroke();
            }

            // Store last point
            lastPt[id] = {x:e.touches[i].pageX, y:e.touches[i].pageY};

        }

    }

    function drawMouse() {
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(currX, currY);
        ctx.strokeStyle = x;
        ctx.lineWidth = larLinha;
        ctx.stroke();
        ctx.closePath();
    }
  
    function end(e) {
    
        e.preventDefault();
        for(var i=0;i<e.changedTouches.length;i++) {
          var id = e.changedTouches[i].identifier;
          // Terminate this touch
          delete lastPt[id];
        }

    }  

    function findxy(res, e) {
        if (res == 'down') {
            prevX = currX;
            prevY = currY;
            currX = e.clientX - canvas.offsetLeft;
            currY = e.clientY - canvas.offsetTop;

            flag = true;
            dot_flag = true;
            if (dot_flag) {
                ctx.beginPath();
                ctx.fillStyle = x;
                ctx.fillRect(currX, currY, 2, 2);
                ctx.closePath();
                dot_flag = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag = false;
        }
        if (res == 'move') {
            if (flag) {
                prevX = currX;
                prevY = currY;
                currX = e.clientX - canvas.offsetLeft;
                currY = e.clientY - canvas.offsetTop;
                drawMouse();
            }
        }
    }

    /* LIMPAR CANVAS == */
    function clearDraw() {
        ctx.clearRect(0, 0, larCanvas, AltCanvas);
    }

    /* COPIAR CANVAS == */
    function copyDraw(){

        var dataURL = canvas.toDataURL();
        var imgCopyDraw = '<img src="'+dataURL+'" />';
        document.getElementById('divCopyDraw').innerHTML = imgCopyDraw;

    }
    
    function saveDraw() {

        var dataURL = canvas.toDataURL();

        var jsonPost = {
            imgBase64:dataURL
        };

        $.post('./assinatura_salvar.php', jsonPost, function(info){
            console.log(info);
        });

    }
  
  </script>
  </head>
  <body onload="init()">
    <canvas id="mycanvas" width="500" height="250" style="border: 1px solid #000;">
      Canvas element not supported.
    </canvas>

    <div>
        <input type="button" value="Reset" onclick="clearDraw()">
        <input type="button" value="Gerar Copia" onclick="copyDraw()">
        <input type="button" value="Salvar Imagem" onclick="saveDraw()">
    </div>

    <div id="divCopyDraw"></div>

    <script type="text/javascript">
        init();
    </script>

  </body>
</html>