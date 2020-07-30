<?php 
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
a {text-decoration:none}
a hover: {text-decoration:none}

.accordion {
	border: 1px solid gray;
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 200px;
  /*border: none;*/
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>