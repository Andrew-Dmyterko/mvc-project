<?php
// Формируем view для редактирования статьи

foreach($data as $row)
{ ?>
<!--    col-md-offset-3 <div class="jumbotron col-lg-10" style="margin-right: auto; margin-left: auto;"> -->
<!--    <div class="jumbotron jumbotron-fluid">-->
    <!-- форма изменения статьи -->
    <div class="jumbotron col-xs-110 col-sm-10 col-md-10 col-lg-10" style="margin-right: auto; margin-left: auto;">
        <a name="edit_article"></a>
        <p class="lead"><em>Пожалуйста внесите изменения в статью и нажмите <u>"Внести изменения"</u></em></p>
        <div class="row justify-left-left">
            <form class="col-sm-12" id="main-form" name="form" method="post" enctype="multipart/form-data" action="http://<?=SITE_NAME?>/Article/update/<?= $row['id'] ?>">
                <div class="form-group">
                    <label for="ArticleTitle">Заголовок статьи</label>
                    <textarea name="title" type="text" class="form-control" id="ArticleTitle" rows="2" ><?= $row['title'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="ArticleSmallText">Краткое содержание статьи</label>
                    <textarea name="article_small_text" class="form-control" id="ArticleSmallText" rows="2"><?= $row['small_text'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="ArticleFullText">Полный текст статьи</label>
                    <textarea name="article_full_text" class="form-control"  id="ArticleFullText" rows="10"><?= $row['full_text'] ?></textarea>
                    <!--                <input name="Article_Full_Text" type="password" class="form-control" id="FullText" placeholder="Confirm Your Password" required>-->
                </div>
                <div class="form-group">
                <a class="btn btn-primary" href="http://<?=SITE_NAME?>" target="_self" role="button" >Вернуться на главную</a>
                <button type="submit" class="btn btn-primary">Внести изменения</button>
                </div>
<!--                    <label class="form-check-label" for="exampleCheck1">Статья активна</label> -->
<!--                    <input name="isActive" type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--                <input name="isActive" type="checkbox" class="form-control" --><?//=  ($row['is_active']===1) ?  "checked" : ""; ?><!-- > Статья активна-->
<!--                </div>-->
                <!--            <a href="https://www.facebook.com/v3.2/dialog/oauth?client_id={{ID}}&redirect_uri={{URL}}&response_type=code&scope=public_profile,email,user_location">Войти через FB</a>-->
            </form>
        </div>
    </div>


<!---->
<!---->
<!--    <div class="jumbotron col-xs-110 col-sm-10 col-md-10 col-lg-10" style="margin-right: auto; margin-left: auto;">-->
<!--<!--        <div class="container">-->
<!--            <h1 class="display-6"><u>--><?//= $row['title'] ?><!--  EDIT</u></h1>-->
<!---->
<!--            <hr class="my-8">-->
<!--            <p class="lead"><em>--><?//= $row['full_text'] ?><!--</em></p>-->
<!--            <a class="btn btn-primary btn-lg" href="http://--><?//=SITE_NAME?><!--" target="_self" role="button" >Вернуться на главную</a>-->
<!--            <a class="btn btn-primary btn-lg" href="http://--><?//=SITE_NAME?><!--/Article/update/--><?//= $row['id'] ?><!--" target="_self" role="button" >Внести изменения</a>-->
<!--            <hr class="my-8">-->
<!--            <p>Дата создания - --><?//= $row['date_create'] ?><!--</p>-->
<!--<!--        </div>-->
<!--    </div>-->
    <?php
}

?>
