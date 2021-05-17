### Component Crud for Begginers

### Example: Into file ".env", insert lines and change fields.

- DB_DRIVER=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=db_name
- DB_USER=root
- DB_PASSWORD=12345

### Example: Into file index.php

<pre>

//DOCUMENTATION EXAMPLE

//START {

//IMPORT COMPOSER AUTOLOAD
require __DIR__ . '/vendor/autoload.php';

//SET CLASS DEPENDECIES
use Crud\Crud;

//LOAD SEPARATE ENVIRONMENT VAR (.env)
#Crud::env(__DIR__);

#or

//LOAD CRUD WITH ENVIRONMENT (.env)
$crud = new Crud(__DIR__);

//SET TABLES
$table = 'tab_client';
$column = 'client'; // KEY STRANGER
$id = 'tab_client_id'; // CUSTOM ID

//ACTION METHODS

// READ ALL IN TABLE
$r = $crud->readAll('*', $table)->fetchAll(PDO::FETCH_ASSOC);
#foreach ($r as $k) { print_r($k) . "\n"; }

// CREATE LINE
#$r = $crud->create($table, $column, '?,?', array(1029, 1));
#echo  STATUS_CRUD === true ? "\nGRAVADO COM SUCESSO!\n" : "\nTENTE NOVAMENTE!\n";

// READ LINE
#$r = $crud->read('*', $table, $id, '?', array(1))->fetchAll(PDO::FETCH_ASSOC);
#foreach ($r as $k) { echo $k[$column] . "\n"; }

// UPDATE LINE
#$r = $crud->update($table, $column, 120, $id, '?', array(2));
#echo  STATUS_CRUD === true ? "\nATUALIZADO COM SUCESSO!\n" : "\nTENTE NOVAMENTE!\n";

// DELETE LINE
#$r = $crud->delete($table, $id, '?', array(57));
#echo  STATUS_CRUD === true ? "\nAPAGADO COM SUCESSO!\n" : "\nTENTE NOVAMENTE!\n";

//TESTING
var_dump($r);

//}END;
</pre>

### Done. Let's Rock! Enjoy!!!