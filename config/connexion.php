<?php
   try
   {
        $dsn = 'mysql:host=127.0.0.1;dbname=Combat';
        $user = 'root';
        $password = '';
        $connexion = new PDO( $dsn, $user, $password);
   }
   catch (Exception $message){
        echo "ya un blem <br>" . "<pre>$message</pre>" ;
   }
   ?>