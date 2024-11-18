<?php 
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        // Leer configuración desde el archivo config.ini
        $config = parse_ini_file(__DIR__ . '/../config/config.ini', true);

        if (!$config || !isset($config['database'])) {
            throw new Exception('Error al cargar la configuración de la base de datos');
        }

        $dbConfig = $config['database'];

        // Establecer conexión
        $this->connection = new mysqli(
            $dbConfig['host'],
            $dbConfig['user'],
            $dbConfig['password'],
            $dbConfig['dbname']
        );

        // Comprobar errores
        if ($this->connection->connect_error) {
            throw new Exception('Error de conexión: ' . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->connection;
    }
}