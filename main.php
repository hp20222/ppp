<?php 
  session_start();
  echo "<h1> welcome $_SESSION[u] !</h1> ";
  
/* 
%'echo "Cookies in this page : <br/>   <br/>  ";
%'echo $_COOKIE['username'] . "</br>" . $_COOKIE['password'] ;

%'echo "</br> Sessions in this page : <br/>   <br/>  ";
%'echo $_SESSION['u'] . "</br>" . $_SESSION['p'] ;

*/
// اذا بدي اليوزر نيم يضل يتنقل من صفحه لصفحه خلي السيشن شغاله 

// اذا بدي الكوكي يضل مخزن المعلومات على الجهاز خلي الكوكي شغال
?>