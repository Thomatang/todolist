<?php
 $filetxt = 'todo.json';
 if(isset($_POST['todoitem'])){
     if(empty($_POST['todoitem'])){
         echo 'Please write down a task, do not be afraid to commit!';
     }
     else{
         $formdata = array(
             'todoitem' => $_POST['todoitem']);
        $filetxt = 'todo.json';

        // pull data from json file before adding nex data into it
        $pulldata = file_get_contents($filetxt);
        //decode pulled data
        $decodeddata = json_decode($pulldata);
        //add new data 
        $decodeddata[]= $formdata;
        //encode new data
        $jsondata= json_encode($decodeddata,JSON_PRETTY_PRINT);

        //put contents in json file
        if(file_put_contents('todo.json', $jsondata))
      echo 'Data successfully saved';
    else echo 'Unable to save data in "todo.json"';
     }
 }

?>


<!doctype html>
<html>
<head>
<title>Todooz</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>Todooz: The best todo-list ... like ever</h1>
  <form action="content.php" method="post">
   Add a task <input type="text" name="todoitem" id="todoitem" /><br />
     <input type="submit" id="submit" value="Send" />
  </form>
</body>
</html>
