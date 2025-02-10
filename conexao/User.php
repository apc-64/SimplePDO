<?php

require_once 'Connection.php';

class User
{
    private  $pdo;

    public function __construct()
    {
        $this->pdo = new Connection();
        $this->pdo = $this->pdo->open('arquivo');
    }

    public function verificarEmail($email)
    {

        if ($email) {
            
            $existe = false;

            $sql = "SELECT * FROM user_example WHERE email = '{$email}'";
            $resultados = $this->pdo->query($sql)->fetchAll();

            foreach ($resultados as $res) {
                if($res){
                    $existe = true;
                }
            }

            return $existe;
        } else {
            print("Erro: não foi possível validar o email!");
        }
    }


    public function verificarUser($email, $senha)
    {
        if($this->verificarEmail($email)){
            if ($senha) {
            
                $existe = false;
    
                $sql = "SELECT * FROM user_example WHERE email = '{$email}' AND senha = '{$senha}'";
                $resultados = $this->pdo->query($sql)->fetchAll();
    
                foreach ($resultados as $res) {
                    if($res){
                        $existe = true;
                    }
                }
    
                return $existe;
            } else {
                print("Erro: não foi possível validar a senha!");
            }


        }
        
    }
}
