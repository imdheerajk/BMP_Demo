<?php

echo "records from db<br>";
foreach($records as $val)
{
    echo $val->id."  ".$val->username."  ".$val->password."<br>";
}


?>

