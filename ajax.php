<?php
  var_dump($_POST);

  $newjsondata= $_POST["json"];
  file_put_contents('todo.json', $newjsondata)

?>

