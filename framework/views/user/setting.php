<?php

?>
<style>
    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 20px;
        width: 50%;
    }
</style>
<table align="center">
    <tr>
        <th colspan="2"style="text-align: center; padding: 20px">Recently used devices</th>
    </tr>
    <?php
            
        foreach ($result as $r){
            echo '<tr>';
            echo '<td style="padding:20px">'.$r->system_type."</td>";
            echo '<td style="padding:20px">'.$r->system_name."</td>";
            echo '</tr>';
        }
    
    ?>
</table>