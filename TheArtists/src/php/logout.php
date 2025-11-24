<!--to logout--> 
<?php
      session_start();
      session_destroy();
      header("Location: /Web Application Programming/htmls/landingPage.html");
?>