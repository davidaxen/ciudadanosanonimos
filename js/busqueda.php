<?php
?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
  <script>
 // Write on keyup event of keyword input element
 $(document).ready(function(){
 $("#search").keyup(function(){
 _this = this;
 // Show only matching TR, hide rest of them
 $.each($("#mytable tbody tr"), function() {
 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
 $(this).hide();
 else
 $(this).show();
 });
 });
});
</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <style> 
#search {
  width: 200px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 10px;
  background-color: white;
  background-image: url('../img/iconos/searchicon.png');
  background-image: url('../../img/iconos/searchicon.png');
  background-position: 0px 0px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}
/*input[type=text]*/
#search:focus {
  width: 100%;
  background-color: #cccccc;
}  
  </style>
  
    <div class="form-group">
 <input type="text" class="form-control pull-right" style="width:300px" id="search" placeholder="Escribe lo que quieres buscar en la tabla...">
</div>