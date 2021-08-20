<?php

class Model
{
    /*
    Модель обычно включает методы выборки данных, это могут быть:
        > методы нативных библиотек pgsql или mysql;
        > методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
        > методы ORM;
        > методы для работы с NoSQL;
        > и др.
*/
    protected const PARAMS = [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '650351',
        'db'   => 'blog_db'
    ];

    public $error; // переменная ошибок

//  Метод подключения к БД
    public static function getConnection(&$error)
    {
        mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);

        $error = '';
        try {
            $connection = new \mysqli(
                static::PARAMS['host'],
                self::PARAMS['user'],
                self::PARAMS['pass'],
                self::PARAMS['db']
            );
        } catch (\Exception $e) {
            $connection = false;
            $error = '!!! Подключение не удалось: ' . $e->getMessage();
        }
        return $connection;
    }

//  Метод закрытия соединение БД
    public static function closeConnection($connections)
    {
        return $connections->close();
    }


	// метод выборки данных
//    Метод получения данных с базы
    public function get_data($article_id = null, &$error)
    {
        $error = '';
        $db = self::getConnection($error); // Создаем подключение к БД

        mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX); // избавляемся от ошибки No index used in query/prepared statement

        // Если нет ошибки подключения выполняем select
        if ($db) {

//            можно добавить проверку на не null и integer $article_id

            $param_for_where = '';

            // формируем условие запроса
            if (!empty(trim($article_id, " \t\n\r\0\x0B,"))) {
                $param_for_where = 'where id=' . $article_id;
            }

            // формируем запрос
            $sql = "select * from article $param_for_where order by `date-time_create` desc ";
//            echo $sql,"<br>";

            try {
                $data = $db->query($sql);
//                var_dump($result);

                $temp = [];

                while ($row = $data->fetch_assoc()) {
                    $temp[] = $row;
                }
                $data = $temp;
            } catch (\Exception $e) {
                $data = false;
                $error = '!!! Ошибка при select: ' . $e->getMessage();
//                var_dump($error);
            }
            $close = self::closeConnection($db);

            return $data;
        } else {

            return $db;
        }
    }

    // метод выборки данных
//    Метод обновления данных в базе
    public function update_data($article_id = null, &$error)
    {
        $params = $_POST;

//        можно добавить проверку на не null и integer $article_id


//        проверяем параметры post не пустые
        if (!empty($params)) {
//    print_r($params);
//    print_r($_FILES);
//            Router::debug($_POST);
//            Router::debug($_REQUEST);

            $error ='';
            $db = self::getConnection($error); // Создаем подключение к БД

            mysqli_report(MYSQLI_REPORT_ALL^MYSQLI_REPORT_INDEX); // избавляемся от ошибки No index used in query/prepared statement

            // Если нет ошибки подключения выполняем update
            if ($db) {

                $param_for_where = '';

                // формируем условие запроса
                if (!empty(trim($article_id, " \t\n\r\0\x0B,"))) {
                    $param_for_where = 'where id=' . $article_id;
                }

                // формируем запрос
                $sql = "update article set `title`='$params[title]', `small_text`='$params[article_small_text]', `full_text`='$params[article_full_text]'  $param_for_where";
//                echo $sql,"<br>";
//die;
                try {
                    $result = $db->query($sql);
//                var_dump($result);
                } catch (\Exception $e) {
                    $result = false;
                    $error = '!!! Ошибка при update: ' . $e->getMessage();
//                    var_dump($error);
                }
                $close = self::closeConnection($db);
                return $result;
            }
            else {
                return $db;
            }
        }else {
            $error = "ERROR!!!! Пустые POST параметры при вызове Model->update_data()";
            return false;
        }
    }


// метод выборки данных
//    Метод обновления данных в базе
    public function insertAdd_data(&$error)
    {
        $params = $_POST;

//        можно добавить проверку на не null и integer $article_id


//        проверяем параметры post не пустые
        if (!empty($params)) {
//    print_r($params);
//    print_r($_FILES);
//            Router::debug($_POST);
//            Router::debug($_REQUEST);

            $error ='';
            $db = self::getConnection($error); // Создаем подключение к БД

            mysqli_report(MYSQLI_REPORT_ALL^MYSQLI_REPORT_INDEX); // избавляемся от ошибки No index used in query/prepared statement

            // Если нет ошибки подключения выполняем insert
            if ($db) {

                $today = date("Y-m-d");
                $todayDayTime = date("Y-m-d H:i:s");
//                echo $todayDayTime;
                // формируем запрос
                $sql = "insert into article set `title`='$params[title]', `small_text`='$params[article_small_text]', `full_text`='$params[article_full_text]', `date_create`='$today', `date-time_create`='$todayDayTime'  ";
//                echo $sql,"<br>";
//                die;
                try {
                    // делаем insert
                    $result = $db->query($sql);

                    // делаем select для получения нового id статьи
                    $sqlSelect = "select `id` from article where `title`='$params[title]' and `small_text`='$params[article_small_text]' and `full_text`='$params[article_full_text]' and `date_create`='$today'  ";
                    $resultSelect = $db->query($sqlSelect);
//                    Router::debug($resultSelect);
//                    Router::debug($resultSelect); die;
                    if ($resultSelect->num_rows === 1) {

                        $result = $resultSelect->fetch_assoc();
//                        echo "dddddd";
//                        Router::debug($result);

                        return $result['id'];

                    } else {
                        $result = false;
                        $error = '!!! Ошибка при insertAdd_data Такая статья уже существует :  $resultSelect!==1' ;
                        return $result;
                    }
//                var_dump($result);
                } catch (\Exception $e) {
                    $result = false;
                    $error = '!!! Ошибка при insertAdd_data: ' . $e->getMessage();
//                    var_dump($error);
                }
                $close = self::closeConnection($db);
                return $result;
            }
            else {
                return $db;
            }
        }else {
            $error = "ERROR!!!! Пустые POST параметры при вызове Model->insertAdd_data()";
            return false;
        }
    }


    // метод выборки данных
//    Метод обновления данных в базе
    public function delete_data($article_id = null, &$error)
    {
        $params = $_POST;

//        можно добавить проверку на не null и integer $article_id

        $error ='';
        $db = self::getConnection($error); // Создаем подключение к БД

        mysqli_report(MYSQLI_REPORT_ALL^MYSQLI_REPORT_INDEX); // избавляемся от ошибки No index used in query/prepared statement

        // Если нет ошибки подключения выполняем delete
        if ($db) {

            $param_for_where = '';

            // формируем условие запроса
            if (!empty(trim($article_id, " \t\n\r\0\x0B,"))) {
                $param_for_where = 'where id=' . $article_id;
            }

            // формируем запрос
            $sql = "delete from article $param_for_where";
//             echo $sql,"<br>";
//die;
            try {
                $result = $db->query($sql);
//               var_dump($result);
            } catch (\Exception $e) {
                $result = false;
                $error = '!!! Ошибка при delete: ' . $e->getMessage();
//               var_dump($error);
            }
            // закрываем соединение с бд
            $close = self::closeConnection($db);
            return $result;
        } else {
                return $db;
            }
    }

}