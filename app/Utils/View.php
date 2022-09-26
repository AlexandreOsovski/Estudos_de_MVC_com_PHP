<?php

namespace App\Utils;

class View {


    /**
     * MÉTODO RESPONSÁVEL POR RETORNAR O CONTEÚDO DE UMA VIEW
     * @param string $view
     * @return string
     */
    private static function getContentView($view){
        $file = __DIR__.'/../../resource/view/'.$view.'.html';

        if(file_exists($file) === TRUE){
            return file_get_contents($file);
        }else{
            return $file = '';
        }

    }
    /**
     * MÉTODO REPONSÁVEL POR RETORNAR O CONTEÚDO RENDERIZADO DE UMA VIEW
     *
     * @param string $view
     * @param array $vars (strings/numeric)
     * @return string
     */
    public static function render($view, $vars = []){
        $conteudoView = self::getContentView($view);

        $chaves = array_keys($vars);
        $chaves = array_map(function ($item){
            return '[#'.$item.'#]';
        }, $chaves);


        return str_replace($chaves, array_values($vars), $conteudoView);
    }
}