<?php // ?>

<!--<style>
    
    table, th, td{
        /*border: 1px solid black;*/
        border-collapse: collapse;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 20px;
        width: 100%;
    }
    
    .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.5s;
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    }

    .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
</style>
<div class="card">
<table align="center">
    <tr>
        <th colspan="2"style="text-align: center; padding: 20px; background-color: #605ca8; color: #fff">Recently used devices</th>
    </tr>
    //<?php
//            
//        foreach ($result as $r){
//            echo '<tr>';
//            echo '<td style="padding:20px">'.$r->system_type."</td>";
//            echo '<td style="padding:20px">'.$r->system_name."</td>";
//            echo '</tr>';
//        }
//    
//    ?>
</table>
</div>-->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
    box-sizing: border-box;
}

.columns {
    float: bottom;
    width: 50%;
    padding: 8px;
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto
}

.price {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

.price:hover {
    box-shadow: 0 16px 32px 0 rgba(0,0,0,0.2)
}

.price .headerCard{
    background-color: #605ca8;
    color: white;
    font-size: 20px;
}

.price li {
    border-bottom: 1px solid gainsboro;
    border-left: 1px solid gainsboro;
    border-right: 1px solid gainsboro;
    padding: 20px;
    text-align: center;
}

/*li:nth-child(even){
    background-color: gainsboro
}*/
@media only screen and (max-width: 600px) {
    .columns {
        width: 100%;
    }
}
</style>
</head>
<body>
<div class="columns">
  <ul class="price">
    <li class="headerCard">Recently used devices</li>
    <?php
        
    foreach ($result as $r){
        
        echo '<li>'.$r->system_name.'</li>';
    }
    
    ?>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="headerCard">Blocked urls</li>
    <li>www.google.com</li>
    <li>www.youtube.com</li>
    <li>www.facebook.com</li>
    <li>www.twitter.com</li>
  </ul>
</div>

</body>
</html>