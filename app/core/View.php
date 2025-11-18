<?php

class View {

    public static function render($view, $data = []) {
        // transforma chaves do array em variáveis
        extract($data);

        ob_start();
        require __DIR__ . '/../views/' . $view . '.php';
        $content = ob_get_clean();

        require __DIR__ . '/../views/layout.php';
    }

}
