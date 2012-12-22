<?php
class Dummy_Module extends Module{

}
global $db;
$dummy=new Dummy_Module('dummy','','',$db);
echo $dummy->getValue('captn3m0');