<?php
    function showArray($array){
        echo "<pre>";
        print_r($array);
        echo "<pre>";
    }

    function drawPage($datas_page){
        //showArray($datas_page);
        extract($datas_page);
        //echo $title;

        ob_start();
        require_once($view);
        $content = ob_get_clean();
        require_once($layout);
    }
?>