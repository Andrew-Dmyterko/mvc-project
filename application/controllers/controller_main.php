<?php

class Controller_Main extends Controller
{

    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }

	function action_index($article_id=null)
	{
	    $data = $this->model->get_data($article_id,$error);

//	    Проверяем есть ли ошибка при выборке данных если нет формирмируем view
        if ($data) {

//          формируем view
            $this->view->generate('main_view.php', 'template_view.php', $data);

        } else {
            echo "<pre>";
            var_dump($data);
            var_dump($error);
        }

	}
}