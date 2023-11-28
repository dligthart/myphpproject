<?php

namespace MyFramework\Core;

class Database 
{
    private static $instance = null;
    
    private $connection = null;
    
    public function __construct(private array $config, private Logger $logger) 
    {
    }

    public function connect() 
    {
        if ($this->connection === null) {
            
            $this->logger->log('Creating a new connection');

            $this->connection = mysqli_connect(
                $this->config['database']['host'], 
                $this->config['database']['username'], 
                $this->config['database']['password'],
                $this->config['database']['database'],
                $this->config['database']['port'],
            );
        } 
    }

    public function query(string $sql): array
    {
        $this->connect();

        $this->logger->log('Executing ' . $sql);

        $result = mysqli_query($this->connection, $sql);
        
        $data = [];

        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        
        return $data;
    }

    public static function getInstance(Logger $logger, $config = null)
    {
        if (self::$instance === null) {
            if ($config === null) {
                throw new \Exception("Singleton requires initial configuration");
            }
            self::$instance = new Database($config, $logger);
        }
        
        return self::$instance;
    }
}

