<?php
/**
 * 
 * 
 *      DOCUMENTATION EXAMPLE
 * 
 * 
 */

 #START

/**
 * IMPORT COMPOSER AUTOLOAD
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * SET CLASS DEPENDECIES
 */
use Crud\Crud;

/**
 * LOAD ENVIRONMENT VAR
 */
Crud::env(__DIR__);

/**
 * LOAD CRUD
 */
$crud = new Crud();

 /**
 * SET TABLES
 */
$table = 'tab_competition';
$column = 'competition'; // KEY STRANGER
$id = 'tab_competition_id'; // CUSTOM ID

/**
 * 
 * ACTION METHODS
 * 
 */

 // READ ALL IN TABLE
$r = $crud->readAll('*', $table)->fetchAll(PDO::FETCH_ASSOC);
#foreach ($r as $k) { echo "<pre>"; print_r($k) . "\n"; echo "</pre>";}

// CREATE LINE
#$r = $crud->create($table, $column, '?,?', array(1029, 1));
#echo  STATUS_CRUD === true ? "\nGRAVADO COM SUCESSO!\n" : "\nTENTE NOVAMENTE!\n";

// READ LINE
#$r = $crud->read('*', $table, $id, '?', array(1))->fetchAll(PDO::FETCH_ASSOC);
#foreach ($r as $k) { echo "<pre>"; echo $k[$column] . "\n"; echo "</pre>";}

// UPDATE LINE
#$r = $crud->update($table, $column, 120, $id, '?', array(2));
#echo  STATUS_CRUD === true ? "\nATUALIZADO COM SUCESSO!\n" : "\nTENTE NOVAMENTE!\n";

// DELETE LINE
#$r = $crud->delete($table, $id, '?', array(57));
#echo  STATUS_CRUD === true ? "\nAPAGADO COM SUCESSO!\n" : "\nTENTE NOVAMENTE!\n";

/**
 * TESTING
 */
var_dump($r);

#END