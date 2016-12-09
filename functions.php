<?php

function convertM($term, $tp) {
        switch ($tp) {
            //Converte uma string para maiúsculas
            case '1':
                $palavra = strtr(strtoupper($term), 'àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ', 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß');
                break;
            //Converte uma string para minúsculas
            case '2':
                $palavra = strtr(strtolower($term), 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß', 'àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ');
                break;            
        }
        return $palavra;
    }

