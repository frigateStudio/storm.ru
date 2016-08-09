<?php
include ROOT.'/views/layouts/header.php';

$times = array("8:00",
                "8:30",
                "9:00",
                "9:30",
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00",
                "12:30",
                "13:00",
                "13:30",
                "14:00",
                "14:30",
                "15:00",
                "15:30",
                "16:00",
                "16:30",
                "17:00",
                "17:30",
                "18:00",
                "18:30"
    );
$busy=array(12,1,20,21);
$status="Свободно";
$i=0;
?>
<table class="record-table">

    <tr>
        <th>Время</th>
        <th>Статус</th>
    </tr>
    <?foreach ($times as $time){
       if(in_array($i,$busy))
           $status="Занято";
        echo "<tr><td>$time</td><td ";
        if($status=="Занято")
            echo 'class = "busy"';
        echo ">$status</td></tr>";
        $status="Свободно";
        $i++;
    }?>
    <!--
    <tr>
        <td>8:00</td>
        <td>Cвободно</td>
    </tr>

   <tr>
        <td>8:30</td>
        <td>Cвободно</td>
    </tr>

   <tr>
        <td>9:00</td>
        <td>Cвободно</td>
    </tr>

   <tr>
        <td>9:30</td>
        <td>Cвободно</td>
    </tr>
 <tr>
        <td>10:00</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>10:30</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>11:00</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>11:30</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>12:00</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>12:30</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>13:00</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>13:30</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>14:00</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>14:30</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>15:00</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>15:00</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>15:30</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>16:00</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>16:30</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>17:00</td>
        <td>Занято</td>
    </tr>
 <tr>
        <td>18:00</td>
        <td>Занято</td>
    </tr>
    <tr>
        <td>18:30</td>
        <td>Занято</td>
    </tr>




-->
</table>



<?
include ROOT.'/views/layouts/footer.php';
