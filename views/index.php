<?php
include ROOT.'/views/layouts/header.php';

?>

<body>
<!--Вывод карточек мастеров-->
<div id="container">
<?php foreach ($masters as $master):?>

    <div class="masters view" id="<?echo $master['id']; ?>" >
        <div class="view view-first">
            <img src="../template/img/masters/master<?echo $master['id']; ?>.jpg">
            <div class="mask">
                <h2><? echo $master['name']; ?></h2>
                <p>
                   <?//Вывод description с разбитием строки по запятой в массив
                   $desc = explode(", ",$master['description']);
                   foreach ($desc as $row){
                       echo $row."<br>";
                   }?>
                </p>
            </div>
        </div>
    </div>
    <? endforeach;?>

</div>





<div class="timead"></div>
<!--<div class="datepicker-here"></div> -->
<div id="dater"></div>



    <script>
        //активные даты с сегдняшнего дня
        $('.datepicker-here').datepicker({
            minDate: new Date()
        });

        //неактивные дни недели от 0 до 6
        var disabledDays = [0, 5];

        //функция применения неактивных дней
        $('.datepicker-here').datepicker({
            onRenderCell: function (date, cellType) {
                if (cellType == 'day') {
                    var day = date.getDay(),
                        isDisabled = disabledDays.indexOf(day) != -1;

                    return {
                        disabled: isDisabled
                    }
                }
            }
        });



        $( function() {
             $('.masters').click( function() {
             var id = $(this).attr('id');
             var url = "ajax/master/"+id;
             $('#container').load(url);
             });
            
            /*
            //функция получения даты и времени из календаря и передача параметром время timestamp
            //  на метод
            $('.datepicker--content').click( function() {
                var timesAdd = $('.-selected-');
                var a=  new Date(timesAdd.attr('data-year'),timesAdd.attr('data-month'),timesAdd.attr('data-date'));
                var url = "ajax/master/"+ Math.floor(a.getTime()/1000);
                $('#container').load(url);
            });
            //функия блокировки кликов по неактивным дням
           $('.-disabled-').click(function(){
                return false;
           });*/
        });





    </script>
</body>


<? include ROOT.'/views/layouts/footer.php';


