<?php
include ROOT.'/views/layouts/header.php';

?>

<body>
<a id="home" href=" ">Назад</a>
<!--Вывод карточек мастеров-->
<div class="datepicker-here">Выберите дату</div>
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


    <script>
      var calendar = $('.datepicker-here');  // инициализация переменной календарем
      var goHome = $('#home');              //инициализация переменной ссылкой на главную
      calendar.hide();
      goHome.hide();
      //заполнение массива выходных дней из бд для каждого мастера
      var holiday=[
      <?php foreach ($masters as $master) {
          echo "[" . $master['holiday']."],";
      }
      ?>];

      $( function() {
          $('.masters').click( function() {
              //получение id мастера по клику
              var id = $(this).attr('id');
              //скрываем контейнер с мастерами
              var container= $('#container').hide();
              //показываем ссылку домой если она скрыта и наоборот
              goHome.toggle();
              //активные даты с сегдняшнего дня
              calendar.datepicker({
                  minDate: new Date()
              });

              //неактивные дни недели от 0 до 6
              //получаем из массива holiday по id мастера              
             var disabledDays = holiday[id-1];

              //функция применения неактивных дней
              calendar.datepicker({
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
              
             //показываем календарь 
             calendar.show();
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



<? include ROOT.'/views/layouts/footer.php';


