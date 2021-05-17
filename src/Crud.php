<?php

namespace Crud;

use Exception;
use Crud\Environment;
use Crud\Database;

class Crud extends Database
{
    /**
     * Method init
     * @param string $dir = null Absolute Path .env
     */
    public function __construct($dir = null)
    {
        // Test if exists string $dir
        if ($dir != null) {
            Environment::load($dir);
        }
    }

    /**
     * Method env
     * @param string $dir Absolute Path .env
     */
    public static function env($dir)
    {
        Environment::load($dir);
    }

    /**
     * Attribute crud and count
     */
    private $crud, $count;

    /**
     * Method statement
     * @param string $query SQL
     * @param array $params array query options
     */
    private function stmt($query, $params)
    {
        // Test connect with bind values
        try
        {
            $this->contParams($params);
            $this->crud = $this->connect()->prepare($query);

            if($this->count>0) {
                for($i=1; $i<=$this->count; $i++) {
                    $this->crud->bindValue($i, $params[$i-1]);
                }
            }

            $this->crud->execute();
            define("STATUS_CRUD" , true);
        }
        // Trait Exception
        catch(Exception $e)
        {
            // Get Error and Set status
            if($e->getCode() == 23000) {
                define("STATUS_CRUD" , "Conflict");
            } else {
                define("STATUS_CRUD" , $e->getCode());
            }
        }
    }

    /**
     * Method count params
     * @param array $params array query options
     */
    private function contParams($params)
    {
        $this->count = count($params);
    }

    /**
     * Method read all select in the table
     * @param string $columns Set column query
     * @param string $table Set table query
     */
    public function readAll($columns, $table)
    {
        $this->stmt("SELECT {$columns} FROM {$table};", array());
        return $this->crud;
    }

    /**
     * Method create insert table 
     * @param string $table Set table query
     * @param string $columns Set column query
     * @param string $values Set values query
     * @param array $params Set array query options
     */
    public function create($table, $columns, $values, $params)
    {
        $this->stmt("INSERT INTO {$table} ({$columns}) VALUES({$values});", $params);
        return $this->crud;
    }

    /**
     * Method read select in the table
     * @param string $column Set column query
     * @param string $table Set table query
     * @param string $id Set id query
     * @param string $value Set value query
     * @param array $params Set array query options
     */
    public function read($column, $table, $id, $value, $params)
    {
        $this->stmt("SELECT {$column} FROM {$table} WHERE {$id}={$value};", $params);
        return $this->crud;
    }

    /**
     * Method update update in the table
     * @param string $table Set table query
     * @param string $column Set column query
     * @param string $data Set data query
     * @param string $id Set id query
     * @param string $value Set value query
     * @param array $params Set array query options
     */
    public function update($table, $column, $data, $id, $value, $params)
    {
        $this->stmt("UPDATE {$table} SET {$column}='{$data}' WHERE {$id}={$value};", $params);
        return $this->crud;
    }

    /**
     * Method delete delete in the table
     * @param string $table Set table query
     * @param string $id Set id query
     * @param string $value Set value query
     * @param array $params Set array query options
     */
    public function delete($table, $id, $value, $params)
    {
        $this->stmt("DELETE FROM {$table} WHERE {$id}={$value};", $params);
        return $this->crud;
    }
}