<?php


echo "<table border=\"1\ cellspacing=\"10\ > <th>
&nbsp;&nbsp;</th>";

for($i=1;$i<10;$i++)
{echo "<th  style=\"background-color:black;color:white\" >&nbsp;$i&nbsp;</th>"; }

for($i=1;$i<10;$i++) 
{

echo "<tr><th style=\"background-color:black;color:white\" >&nbsp;$i&nbsp;</th>";

for($j=1;$j<10;$j++) 
{
echo "<td style=\"background-color:white;color:black\"> &nbsp;&nbsp; <b>". $i*$j.
"&nbsp;&nbsp; </td>";
}echo "</b></tr>";
}echo "</table>";

sup("3","4");

function sup ($a,$b){
   
    echo "<table border=\"1\ cellspacing=\"10\ > <th>
&nbsp;&nbsp;</th>";

for($i=1;$i<10;$i++)
{echo "<th  style=\"background-color:black;color:white\" >&nbsp;$i&nbsp;</th>"; }

for($i=1;$i<10;$i++) 
{

echo "<tr><th style=\"background-color:black;color:white\" >&nbsp;$i&nbsp;</th>";

for($j=1;$j<10;$j++) 
{
    if($i*$j==$a*$b){
        echo "<td style=\"background-color:white;color:black\"> &nbsp;&nbsp; <b>".
"&nbsp;&nbsp; </td>";
    }
    else{
echo "<td style=\"background-color:white;color:black\"> &nbsp;&nbsp; <b>". $i*$j.
"&nbsp;&nbsp; </td>";}
}echo "</b></tr>";
}echo "</table>";
}
?>