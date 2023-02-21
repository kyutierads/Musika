<html>
<head>
<title></title>
</head>
<body>
<?php
$characters = array (
array ( 'name'=>"bob",
'occupation'=>"superhero",
'age'=>30,
'specialty'=>"x-ray vision" ),
array ( 'name'=>"sally",
'occupation'=>"superhero",
'age'=>24,
'specialty'=>"superhuman strength" ),
array ( 'name'=>"mary",
'occupation'=>"arch villain",
'age'=>63,
'specialty'=>"nanotechnology" )
);
foreach ( $characters as $val )
{
  var_dump($val);
  // print_r($val);
 /* foreach ( $val as $key=>$final_val )
  {
    print "$key: $final_val<br>";
  }
print "<br>"; */
}

?>


</body>
</html>
