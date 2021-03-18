<?php 
  
  include('../bbdd.php');
  $sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
  $resultusuario=$conn->prepare($sqltusuario);
  $resultusuario->bindParam(':gente', $_COOKIE['gente']);
  $resultusuario->execute();
  $resultadousuario = $resultusuario->fetch();

  if (isset($_COOKIE['lang']) && $_COOKIE['lang']!='') {
    $idiomacookie=strtolower($_COOKIE['lang']);
  }else{
    $idiomacookie='es';
  }

  $idioma = $resultadousuario['lang'];
  if ($idiomacookie != $idioma) {
    include($_SERVER['DOCUMENT_ROOT']."/lang/$idiomacookie.php");
    $sqlupdatelang = "UPDATE usuarios SET lang = '".$idiomacookie."' WHERE id = ".$resultadousuario['id'].";";
    $conn->exec($sqlupdatelang);
  }else{
    include($_SERVER['DOCUMENT_ROOT']."/lang/$idioma.php");
  }
  
?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="estilo.css">

<!-- Required meta tags -->
  <link rel="stylesheet" type="text/css" href="../portada_n/cabecera.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

<!--This is used for search icon. Instead putting icon manually it is loaded from fontawesome-->


<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

<!-- Bootstrap CSS -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<!--fontawesome-->

<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

<script type="text/javascript">
  
  function redireccion(ruta) {
    window.location.href = ruta;
  }

  function changeLang(lang, iduser){
    //console.log(lang);
    switch(lang){
      case 1: document.cookie="lang=es; path=/;"; break;
      case 2: document.cookie="lang=en; path=/;"; break;
      case 3: document.cookie="lang=he; path=/;"; break;
    }

    $.ajax({
      url: "ajaxchangelang.php",
      type: "POST",
      dataType : 'json',
      data: {
        iduser: iduser,
        lang: lang
      },
      success: function(e){
          console.log(e.message);

      },
      error: function(e) {
            console.log(e.message);
        }
    });
    /*
    if (lang == 1) {
      document.cookie = "lang=es;";
    }else{
      document.cookie = "lang=en;";
    }
    */
    
    location.reload();
    
  }

</script>

</head>
<body style="background-image:url(../img/iconos/portada_ca.jpg); padding-top: 14%;";>

  <!-- navbar -->

      <nav style="padding-left: 10%; background-color: white;"  class="navbar navbar-expand-md navbar-light fixed-top">
          
          <a class="navbar-brand"><img src="<?php echo $LOGOPRIN;?>"></a>
            <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
            <span class="navbar-toggler-icon"></span>
            </button>

        


          <div class="collapse navbar-collapse justify-content-between" id="nav">
            <ul class="navbar-nav">



        <div class="btn-group">

          <li class="btn-group">
        
              <div><a class="nav-link font-weight-bold px-3" href="#" onclick="changeLang(1, <?php echo $resultadousuario['id']; ?>); return false;"><img height="10" width="20" src="/img/bandera_esp.png"></a></div>
            
                <a class="nav-link font-weight-bold px-3" href="#" onclick="changeLang(2, <?php echo $resultadousuario['id']; ?>); return false;"><img height="10" width="20" src="/img/bandera_usa.png"></a>
              
                <a class="nav-link font-weight-bold px-3" href="#" onclick="changeLang(3, <?php echo $resultadousuario['id']; ?>); return false;"><img height="10" width="20" src="/img/bandera_he.png"></a>
          
        
              </li>
          
        </div>

          <div class="btn-group">

            <li class="nav-item">

            <a class="nav-link font-weight-bold px-3" href="/portada_n/ultimasentradas_t.php"><?php echo $MENU_TUSPREGUNTAS; ?></a>

            </li>
          </div>


        <div class="btn-group">
          <li class="nav-item">

          <a class="nav-link font-weight-bold px-3" href="/portada_n/ultimasincidencias_t.php"><?php echo $MENU_RESULTADOS; ?></a>

          </li>
        </div>

        <div class="btn-group">
          <li class="nav-item">

          <a class="nav-link font-weight-bold px-3" href="/portada_n/incidencias_t.php"><?php echo $MENU_INCIDENCIAS; ?></a>

          </li>
        </div>

            <div class="btn-group">

            <li class="nav-item">

            <a class="nav-link font-weight-bold px-3" href="/portada_n/cuenta.php"><?php echo $MENU_MICUENTA; ?></a>

            </li>

          </div>

        <div class="btn-group">
          <li class="nav-item">

          <a class="nav-link font-weight-bold px-3" href="/portada_n/salir.php"><?php echo $MENU_SALIR; ?></a>

          </li>
        </div>

        <div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

          <li class="nav-item">

          <a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php"><?php echo $RUTAAPORTACION; ?></a>

          </li>

        </div>

        

        </div>


        </ul>

          </div>

      </nav>



 
<div style="background-color: white; border-radius: 10px; padding-top: 15px; max-width: 450px; margin:auto; " align="center" class="wrapper fadeInDown">
  <div   class="formContent">
    <div id="smart-button-container">

          <p><strong><?php echo $CUOTASERV; ?></strong></p>
<p><?php echo $MSGPRIN; ?></p>
          <select id="item-options"><option value="cuota" price="1"><?php echo $CUOTAUSD; ?></option></select><p>
         <p><?php echo $AYUDANOSCRECER2; ?></p> 
          <select style="visibility: hidden" id="quantitySelect">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="30">30</option>
          <option value="40">40</option>
          <option value="50">50</option>
          <option value="100">100</option>
          <option value="200">200</option>
          <option value="300">300</option>
          <option value="400">400</option>
          <option value="500">500</option>
          </select>
          <br>
          <br>
        </div>
      <div id="paypal-button-container"></div>
  </div>
</div>
</body>
</html>

    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>
    <script>
      function initPayPalButton() {
        var shipping = 0;
        var itemOptions = document.querySelector("#smart-button-container #item-options");
    var quantity = parseInt(100);
    var quantitySelect = document.querySelector("#smart-button-container #quantitySelect");
    if (!isNaN(quantity)) {
      quantitySelect.style.visibility = "visible";
    }
    var orderDescription = 'cuota de servicio';
    if(orderDescription === '') {
      orderDescription = 'Item';
    }
    paypal.Buttons({
      style: {
        shape: 'pill',
        color: 'blue',
        layout: 'vertical',
        label: 'pay',
        
      },
      createOrder: function(data, actions) {
        var selectedItemDescription = itemOptions.options[itemOptions.selectedIndex].value;
        var selectedItemPrice = parseFloat(itemOptions.options[itemOptions.selectedIndex].getAttribute("price"));
        var tax = (0 === 0) ? 0 : (selectedItemPrice * (parseFloat(0)/100));
        if(quantitySelect.options.length > 0) {
          quantity = parseInt(quantitySelect.options[quantitySelect.selectedIndex].value);
        } else {
          quantity = 1;
        }

        tax *= quantity;
        tax = Math.round(tax * 100) / 100;
        var priceTotal = quantity * selectedItemPrice + parseFloat(shipping) + tax;
        priceTotal = Math.round(priceTotal * 100) / 100;
        var itemTotalValue = Math.round((selectedItemPrice * quantity) * 100) / 100;

        return actions.order.create({
          purchase_units: [{
            description: orderDescription,
            amount: {
              currency_code: 'USD',
              value: priceTotal,
              breakdown: {
                item_total: {
                  currency_code: 'USD',
                  value: itemTotalValue,
                },
                shipping: {
                  currency_code: 'USD',
                  value: shipping,
                },
                tax_total: {
                  currency_code: 'USD',
                  value: tax,
                }
              }
            },
            items: [{
              name: selectedItemDescription,
              unit_amount: {
                currency_code: 'USD',
                value: selectedItemPrice,
              },
              quantity: quantity
            }]
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          alert('Transaction completed by ' + details.payer.name.given_name + '!');
        });
      },
      onError: function(err) {
        console.log(err);
      },
    }).render('#paypal-button-container');
  }
  initPayPalButton();
    </script>