<?php
 $filetxt = 'todo.json';
 if(isset($_POST['todoitem'])){
     if(empty($_POST['todoitem'])){
         echo 'Please write down a task, do not be afraid to commit!';
     }
     else{
         $formdata = array(
             'todoitem' => $_POST['todoitem'],
             'status' => "Todooz"
         );
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
      echo 'Your todo item has been Todoozed!';
    else echo 'Unable to save data in "todo.json"';
     }  
}
?>

<!doctype html>
<html>
<head>
<title>Todooz</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Todooz: The best todo-list ... like ever</h1>
  <form action="form.php" method="post">
   Add a task <input type="text" name="todoitem" id="todoitem" /><br />
     <input type="submit" id="submit" value="Send" />
  </form>

  <h2>Todooz</h2>
        <?php 
        // pull data from json file before adding nex data into it
                $str = file_get_contents($filetxt);
                //decode pulled data
                $jsonTodooz = json_decode($str,true);
        // Loop through array
        foreach($jsonTodooz as $value){
            echo '<div class="todocard">'.$value['todoitem'].'<div class="archive">Archive</div>'.'<span class="close">X</span>'.'</div>' . '<br>';
        }
        ?>

 <h2>Archived</h2>
    <?php
    // pull data from json file before adding nex data into it
            $str = file_get_contents($filetxt);
            //decode pulled data
            $jsonTodooz = json_decode($str,true);
    
    foreach($jsonTodooz as $value){
        if( $value['status']==='Archived'){
        echo '<div class="archivedcard">'.$value['todoitem'].'<span class="close">X</span>'.'</div>' . '<br>';
    }
    }     
    ?>


<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
</body>
</html>
