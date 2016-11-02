<?php
include ROOT . '/views/layouts/header.php';
$routesPath = ROOT.'/config/times.php';
$times = include($routesPath);
?>


<div class="nav-button" id="home"><a href=" ">&#8592 К выбору мастера</a></div>
<div class="nav-button" id="choose_date"><a href=" ">&#8592 К выбору даты</a></div>
<!--Вывод карточек мастеров-->
<div class="datepicker-here"><h3 class="master_name"></h3><h2>Выберите дату:</h2></div>
<div id="container">
    <div class="masters_container">
    <h2>Выберите мастера:</h2>
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

</div>


    <script>
        //заполнение массива выходных дней из бд для каждого мастера
      var holiday=[
      <?php foreach ($masters as $master) {
          echo "[" . $master['holiday']."],";
      }
      ?>];

      //заполнение массива времени по шагу полчаса
      var masterName=[
          <?php foreach ($masters as $master) {
          echo "['" . $master['name']."'],";
      }
          ?>];

      //заполнение массива времени по шагу полчаса
      var times=[
          <?php foreach ($times as $time) {
          echo "['" . $time."'],";
      }
          ?>];

        // jQuery функция срабатывания после полной загрузки страницы
      $( function() {


          var calendar = $('.datepicker-here');  // инициализация переменной календарем
          var goHome = $('#home');              //инициализация переменной ссылкой на главную
          var chooseDate = $("#choose_date");   //инициализация переменной ссылкой на выбор даты
          var a=0;
          var timestamp=0;
          chooseDate.hide();
          calendar.hide();
          goHome.hide();
          var id=0;
          var id_time =-1;
          //Обработка кликов по карточке мастера
          $('.masters').click( function() {
              //получение id мастера по клику
              id = $(this).attr('id');
              //скрываем контейнер с мастерами
              var container_masters = $('.masters_container').hide();

              //показываем ссылку домой если она скрыта и наоборот
              goHome.toggle();
              //активные даты с сегдняшнего дня
              calendar.datepicker({
                  minDate: new Date()
              });

              //неактивные дни недели от 0 до 6
              //получаем из массива holiday по id мастера              
              var disabledDays = holiday[id - 1];

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
              $('.master_name').text("Мастер: "+masterName[id-1]);
              calendar.show();




          });
          //функция получения даты и времени из календаря и передача параметром время timestamp
          //  на метод record/$1
          $(document).on('click','.datepicker--cell-day:not(.-disabled-,.-other-month-)', function() {
              var timesAdd = $(this);
              a=  new Date(timesAdd.attr('data-year'),timesAdd.attr('data-month'),timesAdd.attr('data-date'));
              timestamp=Math.floor(a.getTime()/1000);
              var url = "record/"+id+"/"+timestamp;
              calendar.hide();
              $('#container').load(url);
              chooseDate.show();
              
          });
          //обработка кликов по ссылке к выбору даты
          $(document).on('click','#choose_date', function() {
              $("#container").empty();
              calendar.show();
              $(this).hide();
              return false;
          });
            //обработка кликов по таблице свободного времени
          $(document).on('click','.freeTime', function() {
              $(".master-record,.date-record,.header").hide();
              $(".freeTime").css("background-color","green");
              $(".freeTime").css("color","white");
              $(".freeTime").text("Свободно");
             id_time=$(this).attr("id");

            $("#inputTime").html("<b>Время:</b> "+times[$(this).attr("id")]);
              $("#userInput").show();
              $(this).css({'background-color':'yellow','color':'black'});
              $(this).text("Выбрано");
          });
          //обработка кликов по кнопке "записаться"
          $(document).on('click','#button_record', function() {
              var name = $("#name").val();
              var family = $("#family").val();
              var phone = $("#phone").val();
              var comment = $("#comment").val();
              //передача данных из формы методом POST по адресу "record/do"
              $.post("record/do", { master: id,date:timestamp,name: name, family: family,phone: phone,comment: comment,id_time: id_time},function(data) {

                  $('body').empty();
                  $('body').html("<h2>Спасибо что воспользовались нашим сервисом!</h2><br>"+
                  "<h2>Оператор свяжется с вами в ближайшее время для подтверждения записи</h2>");

              } );
          });


      });
    </script>





<? include ROOT . '/views/layouts/footer.php';


