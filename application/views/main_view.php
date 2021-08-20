<?php
// Формируем главную страницу

foreach($data as $row)
{ ?>
<!--    col-md-offset-3 <div class="jumbotron col-lg-10" style="margin-right: auto; margin-left: auto;"> -->
<!--    <div class="jumbotron jumbotron-fluid">-->
    <div class="jumbotron col-xs-110 col-sm-10 col-md-10 col-lg-10" style="margin-right: auto; margin-left: auto;">
<!--        <div class="container">-->
            <h1 class="display-6"><u><?= $row['title'] ?></u></h1>
            <p class="lead"><em><?= $row['small_text'] ?></em></p>
            <a class="btn btn-primary" href="http://<?=SITE_NAME?>/Article/see/<?= $row['id'] ?>" target="_self" role="button" >Подробнее...</a>
            <a class="btn btn-primary" href="http://<?=SITE_NAME?>/Article/edit/<?= $row['id'] ?>" target="_self" role="button" >Изменить статью</a>
            <hr class="my-8">
<!--            <p>Дата создания - --><?//= date("d-m-Y", strtotime($row['date_create'])); ?><!--</p>-->
            <p>Дата и время создания - <?= date("d-m-Y H:i:s", strtotime($row['date-time_create'])); ?></p>
<!--        </div>-->
    </div>

<?php
}

?>