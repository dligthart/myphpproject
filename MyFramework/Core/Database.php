<?php

namespace MyFramework\Core;

class Database 
{
    private static $instance = null;
    
    private $connection = null;
    
    public function __construct(private array $config) 
    {
    }

    public function connect() 
    {
        if ($this->connection === null) {

            $this->connection = mysqli_connect(
                $this->config['database']['host'], 
                $this->config['database']['username'], 
                $this->config['database']['password'],
                $this->config['database']['database'],
                $this->config['database']['port'],
            );
        }
    }

    public function query(string $sql) 
    {
        $this->connect();

        $result = mysqli_query($this->connection, $sql);
    
        return mysqli_fetch_assoc($result);
    }

    public static function getInstance($config = null)
    {
        if (self::$instance === null) {
            if ($config === null) {
                throw new \Exception("Singleton requires initial configuration");
            }
            self::$instance = new Database($config);
        }
        
        return self::$instance;
    }
}

