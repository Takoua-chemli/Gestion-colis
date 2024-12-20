<?php
require_once 'request.php';

?>
<div class="container">
  <form action="index.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
    </div>
    
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Enter password" required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>

<?php
$rk=new Crud;
$rq=$rk->display();
  foreach ($rq as $r) {
echo $r['name'];
echo $r['password'];
echo "<br/>";
}
?>