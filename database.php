<?php

class database
{
    private $db, $last_query = null;

    function __construct($type, $host, $port, $name, $username, $password)
    {
        try {
            switch ($type) {
                case 'postgres':
                    $this->db = new PDO('pgsql:host=' . $host . ';port=' . $port . ';dbname=' . $name . ';user=' . $username . ';password=' . $password);
                    break;
                case 'sqlite':
                    $this->db = new PDO('sqlite:' . $name);
                    break;
                default:
                    error_log("not known database type", 0);
                    break;
            }
        } catch (Exception $e) {
            echo "oops.." . $e->getMessage() . "\n";
            exit;
        }
    }

    function doQuery($query)
    {

        $stmt = $this->db->query($query);
        $this->last_query = $query;
        if (!$stmt) {
            error_log("Failed to do query with message: " . $this->db->errorInfo(), 0);
            return false;
        }
        return $stmt;
    }

    function doPrepare($query)
    {
        $stmt = $this->db->prepare($query);
        $this->last_query = $query;
        if (!$stmt) {
            error_log("Failed to prepare query with message: " . $this->db->errorInfo(), 0);
            return false;
        }
        return $stmt;
    }

    function doExecute($stmt, $params)
    {
        if (!$stmt->execute($params)) {
            error_log("Failed to execute query with message: " . $stmt->errorInfo(), 0);
            return false;
        }
        return $stmt;
    }

}