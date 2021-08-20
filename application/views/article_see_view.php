<?php
//  Формируем view просмотра статьи

foreach($data as $row)
{ ?>
<!--    col-md-offset-3 <div class="jumbotron col-lg-10" style="margin-right: auto; margin-left: auto;"> -->
<!--    <div class="jumbotron jumbotron-fluid">-->
    <div class="jumbotron col-xs-110 col-sm-10 col-md-10 col-lg-10" style="margin-right: auto; margin-left: auto;">
<!--        <div class="container">-->
            <h1 class="display-6"><u><?= $row['title'] ?></u></h1>

            <hr class="my-8">
            <p class="lead"><em><?= $row['small_text'] ?></em></p>
            <hr class="my-8">
            <p class="lead"><em><?= $row['full_text'] ?></em></p>
            <a class="btn btn-primary" href="http://<?=SITE_NAME?>" target="_self" role="button" >Вернуться на главную</a>
            <a class="btn btn-primary" href="http://<?=SITE_NAME?>/Article/edit/<?= $row['id'] ?>" target="_self" role="button" >Изменить статью</a>
<!--            <a class="btn btn-primary" href="http://--><?//=SITE_NAME?><!--/Article/delete/--><?//= $row['id'] ?><!--" target="_self" role="button" >Удалить статью</a>-->

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Удалить статью
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><font color="red"><b><u>Удаление!!!</u></b></font></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Подтвердите удаление статьи?<br>
                        <b>"<?= $row['title'] ?>"</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <a href="http://<?=SITE_NAME?>/Article/delete/<?= $row['id'] ?>"> <button type="button"  class="btn btn-primary">Удаление!!!</button></a>
                    </div>
                </div>
            </div>
        </div>



            <hr class="my-8">
            <p>Дата и время создания - <?= date("d-m-Y H:i:s", strtotime($row['date-time_create'])); ?></p>
<!--        </div>-->
    </div>
    <?php
}

?>