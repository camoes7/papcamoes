<?php
$to="miguel.canossa@gmail.com";
$subject="the subject";
$message="Ora vê lá se recebes isto...";
$headers='From:miguel.canossa@gmail.com' . "\r\n". 
          'Reply-To:miguel.canossa@gmail.com'. "\r\n". 
          'X-Mailer: PHP/' .phpversion();
mail($to,$subject, $message, $headers);
?>