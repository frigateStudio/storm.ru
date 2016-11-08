<footer>
    <menu>
        <ul>
            <li><a href="/" class="ulMenu-1">ГЛАВНАЯ</a></li>
            <li><a href="service" class="ulMenu-2">УСЛУГИ</a></li>
            <li><a href="stock" class="ulMenu-3">АКЦИИ</a></li>
            <li><a href="gallery" class="ulMenu-4">ГАЛЕРЕЯ</a></li>
            <li><a href="review" class="ulMenu-5">ОТЗЫВЫ</a></li>
            <li><a href="contacts" class="ulMenu-6">КОНТАКТЫ</a></li>
        </ul>
    </menu>
</footer>

<!--Добавление класса active для активного пункта меню-->
<script>
    $(document).ready(function() {
        $('.ulMenu-<?php echo $idActiveMenu?>').addClass('active');
    });
</script>

