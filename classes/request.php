<?php
require_once 'crud.php';
$crud = new Crud;

// Insert Record in user table
  if(isset($_POST['submit'])) {
    $crud->insert($_POST);
  }

  // Edit user record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $customer = $crud->displyaRecordById($editId);
  }

  // Update Record in user table
  if(isset($_POST['update'])) {
    $crud->updateRecord($_POST);
  }  
?>

