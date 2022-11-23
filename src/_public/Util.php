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

    public static function FormatarDataExibir($d) {
        return explode('-', $d)[2] . '/' . explode('-', $d)[1] . '/' . explode('-', $d)[0];
    }

    public static function FormatarHoraExibir($h) {
        return explode(':', $h)[0] . ':' . explode(':', $h)[1];
    }

    public static function CriarSenha($senha)
    {
        $senhaArray = explode('@', $senha);
        return password_hash($senhaArray[0], PASSWORD_DEFAULT);
    }

    public static function remove_especial_char($string)
    {
        $especiais = array(".", ",", ";", "!", "@", "#", "%", "¨", "*", "(", ")", "+", "-", "=", "§", "$", "|", "\\", ":", "/", "<", ">", "?", "{", "}", "[", "]", "&", "'", '"', "´", "`", "?", '“', '”', '$', "'", "'", ' ');
        $string = str_replace($especiais, "", strip_tags(trim($string)));
        return $string;
    }

    public static function DescricaoStatus($status)
    {
        $tipo = "";
        switch ($status) {
            case STATUS_ATIVO:
                $tipo = "Ativo";
                break;
            case STATUS_INATIVO:
                $tipo = "Inativo";
                break;
            
        }
        return $tipo;
    }

    public static function DescricaoTipo($tipo): string
    {
        $nome = "";
        switch ($tipo) {
            case PERFIL_ADM:
                $nome = "Administrador";
                break;
            case PERFIL_FUNCIONARIO:
                $nome = "Funcionário";
                break;
            case PERFIL_TECNICO:
                $nome = "Técnico";
                break;
        }
        return $nome;
    }
}
