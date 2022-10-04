<?php

namespace Src\_public;

class Util
{

    public static function Mostrar($p)
    {
        echo '<pre>';
        var_dump($p);
        echo '</pre>';
    }

    public static function CodigoLogado()
    {
        return 1;
    }

    public static function TratarDados($palavra)
    {

        return strip_tags(trim($palavra));
    }

    public static function SetarFusoHorario()
    {
        date_default_timezone_set('America/Sao_Paulo');
    }

    public static function HoraAtual()
    {
        self::SetarFusoHorario();
        return date('H:i:s');
    }

    public static function DataAtual()
    {
        self::SetarFusoHorario();
        return date('d/m/Y');
    }
    public static function ChamarPagina($page)
    {
        header("location: $page");
        exit;
    }

    public static function GravaDataAtual()
    {
        self::SetarFusoHorario();
        return date('Y-d-m');
    }
}
