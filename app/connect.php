<?php
class Connect
{
    private $username = "root";
    private $password = ""; // Adicione a senha correta aqui, se houver
    private $dsn = 'mysql:host=localhost;dbname=db_library;charset=utf8';
    private $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            // Tenta criar uma nova conexão PDO
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            // Define o modo de erro para exceção
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
        } catch (PDOException $e) {
            // Captura e exibe erros de conexão
            echo 'ERROR: ' . $e->getMessage();
            $this->conn = null; // Garante que $conn seja nulo em caso de erro
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

// Exemplo de uso
$database = new Connect();
$conn = $database->getConnection();

if ($conn) {
    // Sua lógica para interagir com o banco de dados
} else {
    echo "Falha na conexão ao banco de dados.";
}
?>