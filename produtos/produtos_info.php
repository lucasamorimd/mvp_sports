
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">  
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
          body{margin-top: 3%;}
          .imgproduto{float: left;margin-right: 3.5%;}
          .t1{font-weight: bold; font-size: 190%;text-transform: uppercase; };
          .t2{font-weight: bold; font-size: 95%;text-transform: uppercase; }
          .t3{font-weight: regular; font-size: 95%;text-transform: uppercase;}
          .t4{font-weight: bold; font-size: 125%;text-transform: uppercase;}
          .opcoes{margin-left: 37.5%;}
          .opcoes1{margin-left: -3%;}
      </style>
    </head>

    <body>
        <article>
            <section>
                <div class="container" >
                    <div class="imgproduto">
                        <img src="../images/apolo1.jpg">
                    </div>
                    <div>
                        <p class="t1"> nome produto aqui</p>
                        <p class="t2 grey-text">ID PRODUTO AQUI</p>
                        <p class="t1">r$:<a href="">000,00</a></p>
                        <p class="t1">marca:<a href=""></a></p>
                        <div class="input-field col s12 opcoes">
                            <select>
                                <option value="" disabled selected>selecionar...</option>
                                <option value="1">pequeno</option>
                                <option value="2">médio</option>
                                <option value="3">grande</option>
                            </select>
                            <label class="opcoes1"> TAMANHO</label>
                        </div>
                        <div class="input-field col s12 m3 opcoes">
                            <select>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <label class="opcoes1"> QUANTIDADE</label>
                        </div>
                        <div class="opcoes"><a class="btn orange darken-2" onclick="Materialize.toast('adicionado ao carrinho!', 4000)">adicionar ao carrinho !</a></div>
                    </div>
                </div>    
            </section>
        </article>  
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script>
  $(document).ready(function() {
    $('select').material_select();
  });        
        </script>
    </body>
  </html>

