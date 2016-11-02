<?php

//echo $timestamp;
$routesPath = ROOT.'/config/times.php';
$times = include($routesPath);
$status="Свободно";
$i=0;
$date = strftime("%d %B, %Y, %A",$timestamp);
?>
<h2 class="master-record">Мастер: <? echo $nameMaster?></h2>
<h2 class="date-record"><? echo $date;?></h2>

<h3 class="header">Выберите время</h3>
<table class="record-table">

    <tr>
        <th>Время</th>
        <th>Статус</th>
    </tr>
    <?foreach ($times as $time){
       if(in_array($i,$busy))
           $status="Занято";
        if($i>$limit_day)
            break;
        echo "<tr><td>$time</td><td id='$i' ";
        if($status=="Занято")
            echo 'class = "busyTime"';
        else
            echo 'class = "freeTime"';
        echo ">$status</td></tr>";
        $status="Свободно";
        $i++;
    }?>

</table>
<div id="userInput">
    <p><b>Мастер:</b> <?echo $nameMaster?></p>
    <p><b>Дата:</b> <? echo $date?></p>
    <p id="inputTime"></p>
   <p>Имя<br><input type="text" id="name"></p>
   <p>Фамилия<br><input type="text" id="family"></p>
   <p>Телефон<br><input type="text" id="phone"></p>
   <p>Желаемые услуги<br><textarea rows="8" cols="70" placeholder="Опишите процедуры, необходимые вам" id="comment"></textarea></p>
    <span id="button_record">Записаться</span>


</div>

<?
include ROOT . '/views/layouts/footer.php';
