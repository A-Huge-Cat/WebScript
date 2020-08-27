<html>
    <head>
        <title>XSS-DOM</title>
        <h1><center>Weclome to learn XSS-DOM</center></h1>
    </head>
    <body>
        <script>
           function xssdom(){
               var a =document.createElement('hello');                  //在这个地方自己创建了一个标签，可以是HTML自带的，也可以是自创的
               var linkText=document.createTextNode("let's click it");  //创建了一个DOM节点
               a.title="DOM XSS -innerHTML";      //没什么用的一行，title嘛 
               link=document.getElementById("test").value;
               a.href=link;
           document.getElementById("hello").innerHTML='<a href="'+link+'">'+linkText.textContent+'</a>';
           document.getElementById("areyou").appendChild(a);   //在a后面创建一个文本节点
           }
        </script>  
        
        <input type="text" id="test">
        <div id="hello"></div>

        <div id="areyou"></div>
        <input type="button" onclick="xssdom();" value="Run">
    </body>
</html>
