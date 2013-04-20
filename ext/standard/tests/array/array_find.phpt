--TEST--
basic array_find test
--FILE--
<?php
function odd($var)
{
   return($var & 1);
}

function even($var)
{
   return(!($var & 1));
}

$array1 = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);
$array2 = array(6, 7, 8, 9, 10, 11, 12, 0);
$array3 = array(TRUE, FALSE, NULL);

echo "Odd :\n";
var_dump(array_find($array1, "odd"));
var_dump(array_find($array2, "odd"));
var_dump(array_find($array3, "odd"));
echo "Even:\n";
var_dump(array_find($array1, "even"));
var_dump(array_find($array2, "even"));
var_dump(array_find($array3, "even"));

var_dump(array_find(array()));
var_dump(array_find(array(), array()));
var_dump(array_find("", null));
var_dump(array_find($array1, 1));

echo '== DONE ==';
?> 
--EXPECTF--
Odd :
int(1)
int(7)
bool(true)
Even:
int(2)
int(6)
bool(false)
NULL

Warning: array_find() expects parameter 2 to be a valid callback, array must have exactly two members in %s on line %d
NULL

Warning: array_find() expects parameter 1 to be array, string given in %s on line %d
NULL

Warning: array_find() expects parameter 2 to be a valid callback, no array or string given in %s on line %d
NULL
== DONE ==
