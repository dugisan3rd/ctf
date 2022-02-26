<?php

if(isset($_POST['file'])){
  echo "Contenu du fichier " . $_POST['file'] .  " :  </br>";
  echo ("<PRE>" . shell_exec("cat logs/" .  $_POST['file']) . "</PRE>");
}

}

if($_GET['page']==="date"){
  echo "</br></br>The curent time: </br>";
  echo(shell_exec("date"));
}

if($_GET['page']==="users"){
  echo "</br></br>Users list: </br> - Admin";
}

if($_GET['page']==="ping"){
  echo "</br></br>Ping google DNS: ";
  echo("<pre>" . shell_exec("ping 8.8.8.8 -c 3") . "</pre>");
}


if(!isset($_GET['page'])){
  echo "</br> <h1>Admin area</h1></br>Access forbidden if you don't have permission to access";
}

?>
</PRE>