<?php

class Connection
{
    public function __construct() {}

    public static function open($arquivo)
    {

        if (file_exists("../conexao/config/{$arquivo}.ini"))
        {
            $db = parse_ini_file("../conexao/config/{$arquivo}.ini");
        }    
        else{
            throw new Exception('arquivo não encontrado');
        }
           
        $host =   $db['host'] ?? null;
        $port =   $db['port'] ?? null;
        $dbname = $db['dbname'] ?? null;
        $user =   $db['user'] ?? null;
        $pass =   $db['pass'] ?? null;
        $type =   $db['type'] ?? null;

        $conn = '';
        switch ($type) {
            case 'pgsql':
                $conn = new PDO("{$type}:host={$host};port={$port};dbname={$dbname};user={$user};password={$pass}");
                break;
            case 'mysql':
                $conn = new PDO("{$type}:;host={$host};dbname={$dbname};port={$port}", $user, $pass);
                break;
            case 'sqlite':
                $conn = new PDO("{$type}:dbname={$dbname}");
                break;
        }

       
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}
