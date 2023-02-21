<?php    
$emp = array  
  (  
  array(1, 2, 3, "A"),  
  array(1, 2, "B", "C"),  
  array(1 ,"D", "E", "F")  
  );  
  
for ($row = 0; $row < 3; $row++) {  
  for ($col = 0; $col < 4; $col++) {  
    echo $emp[$row][$col]."  ";  
  }  
  echo "<br>";  
}  
?>  