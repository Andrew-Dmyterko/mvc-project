<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Router
{
//    public static $uri;
//    public static $uriArray;

    public static function debug($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

	public static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';

        if (!empty($_SERVER['REQUEST_URI'])) {
            $uri = trim($_SERVER['REQUEST_URI'], '/');
            $uriArray = explode('/', $uri);
        }
		// получаем имя контроллера
		if ( !empty($uriArray[0]) )
		{
			$controller_name = ucfirst(array_shift($uriArray));
//			self::debug($controller_name);
		}

		// получаем имя экшена
		if ( !empty($uriArray[0]) )
		{
			$action_name = array_shift($uriArray);
//			self::debug($action_name);
		}

//		self::debug($uriArray);

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		/*
		echo "Model: $model_name <br>";
		echo "Controller: $controller_name <br>";
		echo "Action: $action_name <br>";
        var_dump($uriArray);
		*/

		// подцепляем файл с классом модели (файла модели может и не быть)
		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Router::ErrorPage404();
		}

		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;

		if(method_exists($controller, $action))
		{

		    if ($controller_name === 'Controller_Article' && ($action_name === 'action_see'
                        || $action_name === 'action_edit' || $action_name === 'action_update'
                        || $action_name === 'action_delete')) {

                $param = trim(array_shift($uriArray), " \t\n\r\0\x0B," );

                if (!empty($param)) {
                    // вызываем действие контроллера
                    $controller->$action($param);
                } else {
                    // здесь также разумнее было бы кинуть исключение
                    Router::ErrorPage404();
                }
            }
		    // вызываем действие контроллера
			else {
		        $controller->$action();
		    }
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Router::ErrorPage404();
		}
	
	}

	public static function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
