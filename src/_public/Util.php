<?php

namespace Src\_public;

class Util
{
    public static function IniciarSessao()
    {
        if (!isset($_SESSION))
            session_start();
    }

    public static function CriarSessao($id, $nome)
    {
        self::IniciarSessao();
        $_SESSION["id"] = $id;
        $_SESSION["nome"] = $nome;
    }

    public static function CodigoLogado()
    {
        self::IniciarSessao();
        return isset($_SESSION["id"]) ? $_SESSION["id"] : 0;
        //return 1;
    }

    public static function NomeLogado()
    {
        self::IniciarSessao();
        return $_SESSION["nome"];
    }

    public static function Deslogar()
    {
        self::IniciarSessao();
        unset($_SESSION["id"]);
        unset($_SESSION["nome"]);
        self::IrParaLogin();
    }

    public static function IrParaLogin()
    {
        header('location: login.php');
        exit;
    }

    public static function VerificarLogin()
    {
        self::IniciarSessao();
        if (!isset($_SESSION['id']))
            self::IrParaLogin();
    }

    public static function Mostrar($p)
    {
        echo '<pre>';
        var_dump($p);
        echo '</pre>';
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

    public static function GravaDataHoraAtual()
    {
        self::SetarFusoHorario();
        return date('Y-m-d H:i:s');
    }

    public static function GravaDataAtual()
    {
        self::SetarFusoHorario();
        return date('Y-m-d');
    }

    public static function FormatarDataExibir($d)
    {
        return explode('-', $d)[2] . '/' . explode('-', $d)[1] . '/' . explode('-', $d)[0];
    }

    public static function FormatarHoraExibir($h)
    {
        return explode(':', $h)[0] . ':' . explode(':', $h)[1];
    }

    public static function VerificarSenhaCriptografada($senha)
    {
        return password_hash($senha, PASSWORD_DEFAULT);
    }

    public static function CriarSenha($senha)
    {
        $senhaArray = explode('@', $senha);
        return password_hash($senhaArray[0], PASSWORD_DEFAULT);
    }

    public static function ValidarSenhaBanco($senha, $senha_hash)
    {
        return password_verify($senha, $senha_hash);
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

    public static function CreateTokenAuthentication(array $dados_user)
    {
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];

        $payload = $dados_user;
        $header = json_encode($header);
        $payload = json_encode($payload);
        $header = base64_encode($header);
        $payload = base64_encode($payload);
        $sign = hash_hmac(
            "sha256",
            $header . '.' . $payload,
            SECRET_JWT_FUNC,
            true
        );
        $sign = base64_encode($sign);
        $token = $header . '.' . $payload . '.' . $sign;
        return $token;
    }

    public static function AuthenticationTokenAccess()
    {
        //Recupera todo o cabeçalho da requisição
        $http_header = apache_request_headers();
        //Se n for nulo
        if ($http_header['Authorization'] != null && str_contains($http_header['Authorization'], '.')) :
            //quebra o bearer(autenticação de token)
            $bearer = explode(' ', $http_header['Authorization']);
            $token = explode('.', $bearer[1]);
            //quebrando os valores e jogango em seus significados
            $header = $token[0];
            $payload = $token[1];
            $sign = $token[2];
            //Faz a criptografia novamente para ver se bate com a chave
            $valid = hash_hmac('sha256', $header . '.' . $payload, SECRET_JWT_FUNC, true);
            $valid = base64_encode($valid);
            if ($valid === $sign)
                return true;
            else
                return false;
        endif;
        return false;
    }
}
