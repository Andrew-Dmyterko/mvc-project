<?php

class Controller_Article extends Controller
{

    function __construct()
    {
        $this->model = new Model_Article();
        $this->view = new View();
    }

// Метод просмотра статьи
	function action_see($article_id)
	{
	    $data = $this->model->get_data($article_id, $error);

//	    Проверяем есть ли ошибка при выборке данных и размер массива должен быть 1 если все гуд формирмируем view
	    if ($data && count($data)===1) {

//          формируем view
            $this->view->generate('article_see_view.php', 'template_view.php', $data);

        } else {
	        echo "<pre>";
            var_dump($data);
            var_dump($error);
	    }
	}

	// Метод редактирования статьи
	function action_edit($article_id)
	{
	    $data = $this->model->get_data($article_id, $error);

//	    Проверяем есть ли ошибка при выборке данных и размер массива должен быть 1 если все гуд формирмируем view
        if ($data && count($data)===1) {

//          формируем view
            $this->view->generate('article_edit_view.php', 'template_view.php', $data);

        } else {
            echo "<pre>";
            var_dump($data);
            var_dump($error);
        }
	}

    // Метод обновления данных статьи
    function action_update($article_id)
    {
        $result = $this->model->update_data($article_id, $error);
        $data = $this->model->get_data($article_id, $error);

//	    Проверяем есть ли ошибка при выборке данных и размер массива должен быть 1 если все гуд формирмируем view
        if ($data && count($data) === 1) {

//          формируем view
            $this->view->generate('article_see_view.php', 'template_view.php', $data);

        } else {
            echo "<pre>";
            var_dump($data);
            var_dump($error);
        }
    }

    // Метод добавления(создания) новой статьи (выводим view )
    function action_insert()
    {
//          формируем view
            $this->view->generate('article_insert_view.php', 'template_view.php');
    }

    // Метод добавления новых данных в новую статью (создание новой статьи и внесение в базу)
    function action_insertAdd()
    {
        $result = $this->model->insertAdd_data($error);

//        if (!$result) {
//            Router::debug($result);
//            Router::debug($error);
//        }
        // $result должен содержать новый article_id
        $data = $this->model->get_data($result, $error);

//	    Проверяем есть ли ошибка при выборке данных и размер массива должен быть 1 если все гуд формирмируем view
        if ($data && count($data) === 1) {

//          формируем view
            $this->view->generate('article_see_view.php', 'template_view.php', $data);

        } else {
            echo "<pre>";
            var_dump($data);
            var_dump($error);
        }
    }

    // Метод удаления статьи
    function action_delete($article_id)
    {
        $result = $this->model->delete_data($article_id, $error);

//        $data = $this->model->get_data($article_id=null, $error);

//	    Проверяем есть ли ошибка при выборке данных и размер массива должен быть 1 если все гуд формирмируем view
        if ($result) {

//          формируем view
//            $this->view->generate('main_view.php', 'template_view.php', $data);

            // удалили и сразу редиректимся на главную
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:'.$host);

        } else {
            echo "<pre>";
            var_dump($result);
            var_dump($error);
        }
    }
}