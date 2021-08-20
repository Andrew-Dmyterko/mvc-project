<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CMS блога на MVC паттерне и ООП</title>
    <link rel="shortcut icon" href="/images/ico_.ico" type="image/x-icon">

    <!-- Include Scripts -->
    <!-- Bootstrap CSS -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS --> <!-- Optional JavaScript -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Include Styles -->
    <!-- ????почему это не работает   <link rel="stylesheet" href="/style/styles.css">-->
    <style>
        body {background: url("/images/Earth-terminator.jpg")}
    </style>

</head>

<body class="background-image">
<!--{{navigation}} потом сделать навигацию страницы -->
    <div class="alert alert-primary col-xs-110 col-sm-10 col-md-10 col-lg-10" style="background-color: #e9ecef; margin-right: auto; margin-left: auto;">
        <header>
            <h2>
                <span><b><u>CMS блога на MVC паттерне и ООП</u></b></span>
            </h2>
        </header>
    </div>

    <div id="content">
        <div class="box">
    		<?php include 'application/views/'.$content_view; ?>
    		<!--
    		<h2>Welcome to Accumen</h2>
    		<img class="alignleft" src="images/pic01.jpg" width="200" height="180" alt="" />
    		<p>
    			This is <strong>Accumen</strong>, a free, fully standards-compliant CSS template by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>. The images used in this template are from <a href="http://fotogrph.com/">Fotogrph</a>. This free template is released under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attributions 3.0</a> license, so you are pretty much free to do whatever you want with it (even use it commercially) provided you keep the footer credits intact. Aside from that, have fun with it :)
    		</p>
    		-->
    	</div>
    </div>


    <div id="footer">
        <div class="alert alert-primary col-xs-110 col-sm-10 col-md-10 col-lg-10" style="background-color: #e9ecef; margin-right: auto; margin-left: auto;">
            <footer>
                <h6>
                    <span><b>-- by sky_fox</b>  <br>  e-mail: andrew.dmyterko@gmail.com; sky_fox123@ukr.net</span>
                </h6>
<!--               !!!!!!!!!!!потом перенести кнопку на навигатион бар-->
                <a class="btn btn-primary" href="http://<?=SITE_NAME?>/Article/insert/" target="_self" role="button" >Новая статья</a>
            </footer>
            <script>
                <!--console.log(window);-->
            </script>
        </div>

    </div>


</body>
</html>