<?php
date_default_timezone_set('Europe/Amsterdam');    
$DateAndTime = date('m-d-Y h:i:s a', time());  
echo nl2br("c'est $DateAndTime. \n");

if(array_key_exists('button1', $_POST)) { 
    button1(); 
} 
else if(array_key_exists('button2', $_POST)) { 
    button2(); 
} 

function button1() { 
    echo "Button1 clicked"; 
} 
function button2() { 
    echo "Button2 clicked"; 
} 
function button3() {}
?>
<br></br>

<form method="post"> 
    <input type="submit" name="button1" class="button" value="Button1" /> 
    <input type="submit" name="button2" class="button" value="Button2" /> 
    <input type="submit" name="button3" class="button" value="Clear" /> 

</form> 


