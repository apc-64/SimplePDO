<?php



require_once '../conexao/User.php';


$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;

$usuario = new User();


echo "<style>body { background-color: #444444; }</style>";

if ($email && $senha) {
    if ($usuario->verificarEmail($email)) {
        if ($usuario->verificarUser($email, $senha)) {
            echo "<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color:rgb(255, 255, 255); padding: 20px; border: 1px solidrgb(255, 255, 255); border-radius: 5px;'>
                    <p style='color:rgb(0, 255, 4);'>Você logou com sucesso!</p>
                    <p>Você será levado para a tela principal.</p>
                  </div>";
            header("refresh: 4;url=../visual/index.html");
        } else {
            echo "<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #f2dede; padding: 20px; border: 1px solidrgb(255, 255, 255); border-radius: 5px;'>
                    <p style='color:rgb(255, 4, 0);'>Sua senha está incorreta!</p>
                     <p>Você será levado para a tela principal.</p>
                  </div>";
            header("refresh: 4;url=../visual/index.html");
        }
    } else {
        echo "<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #f2dede; padding: 20px; border: 1px solidrgb(197, 197, 197); border-radius: 5px;'>
                <p style='color:rgb(255, 4, 0);'>Esse email não existe!</p>
                 <p>Você será levado para a tela principal.</p>
              </div>";
        header("refresh: 4;url=../visual/index.html");
    }
} else {
    echo "<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fcf8e3; padding: 20px; border: 1px solidrgb(255, 170, 0); border-radius: 5px;'>
            <p style='color: #8a6d3b;'>Campos não preenchidos!</p>
             <p>Você será levado para a tela principal.</p>
          </div>";
    header("refresh: 4;url=../visual/index.html");
}
