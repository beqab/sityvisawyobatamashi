<?php
session_start();

$id = $_POST['id'];
echo $_SESSION['id'] = $id;
