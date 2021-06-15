<?php
class controller {
    const View_folder = "Views";
    const Model_folder = "Models";
    public function loadModel($model)
    {
        require_once('./'.self::Model_folder.'/'.$model.".php");

    }
    public function View($view, $data=[])
    {
        $view = './'.self::View_folder.'/'.str_replace('.','/',$view).'.php';
        return require_once("./Views/Admin/index.php");   
    }
}
?>