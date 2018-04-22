<?php
session_start();

$id = $_POST['id'];
$total = $_POST['total'];

if($id < $total){
   $id += 1;
   echo $_SESSION['id'] = $id;
 }else{
	//session_destroy();
}





