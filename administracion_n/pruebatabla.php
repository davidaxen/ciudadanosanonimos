<style>
.col1 {display: none; } 
.col2 {display: none; } 
.col3 {display: none; } 

table.show1 .col1 { display: table-cell; } 
table.show2 .col2 { display: table-cell; } 
table.show3 .col3 { display: table-cell; }



.table-fixed thead,
.table-fixed tfoot{
  width: 97%;
}

.table-fixed tbody {
  height: 230px;
  overflow-y: auto;
  width: 100%;
}

.table-fixed thead,
.table-fixed tbody,
.table-fixed tfoot,
.table-fixed tr,
.table-fixed td,
.table-fixed th {
  display: block;
}

.table-fixed tbody td,
.table-fixed thead > tr> th,
.table-fixed tfoot > tr> td{
  float: left;
  border-bottom-width: 0;
}
</style>


<script>
function toggleColumn(n) 
{ var currentClass = document.getElementById("mytable").className; 
if (currentClass.indexOf("show"+n) != -1) 
{ document.getElementById("mytable").className = currentClass.replace("show"+n, ""); 
} 
else
{
 document.getElementById("mytable").className += " " + "show"+n; 
 } 
 }
</script>


<table id="mytable" class="table table-fixed">

<tr> <th onclick="toggleColumn(1)">Col 1 = A + B + C</th> 
<th class="col1">A</th> 
<th class="col1">B</th> 
<th class="col1">C</th> 
<th onclick="toggleColumn(2)">Col 2 = D + E + F</th> 
<th class="col2">D</th> 
<th class="col2">E</th> 
<th class="col2">F</th> 
<th onclick="toggleColumn(3)">Col 3 = G + H + I</th> 
<th class="col3">G</th> 
<th class="col3">H</th> 
<th class="col3">I</th> 
</tr> 
<tr> 
<td>20</td> 
<td class="col1">10</td> 
<td class="col1">10</td> 
<td class="col1">0</td> 
<td>20</td> 
<td class="col2">10</td> 
<td class="col2">8</td>
<td class="col2">2</td> 
<td>20</td> 
<td class="col3">10</td> 
<td class="col3">8</td>
<td class="col3">2</td>
 </tr> 
 </table>

