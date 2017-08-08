<?php 

$date = new DateTime();

print $date->format("d/m/Y");

print "<br>" ;

$date->setDate(2017,8 ,7);


print $date->format("d/m/y");
