<?php

namespace App\Controller;

use App\Vendor\DataTable\SSP;

class DataTable {
    // DB table to use
    private $table = 'sakura_';
    
    // Table's primary key
    private $primaryKey = 'id';
    
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
    public $columns;
    
    // SQL server connection information
    private $sql_details = array(
        'user' => 'usersql',
        'pass' => 'passwordsql',
        'db'   => 'sakura',
        'host' => 'database'
    );
    
    
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    * If you just want to use the basic configuration for DataTables with PHP
    * server-side, there is no need to edit below this line.
    */
    public function serverProcessing(){
        $this->table .=  $_GET['table'];
        $class = "App\Model\\".ucfirst($_GET['table']);
        $object = new $class();
        $vars = get_class_vars($class);
        $column = [];
        $this->columns = array(
            array(
                'db' => 'id',
                'dt' => 'DT_RowId',
                'formatter' => function( $d, $row ) {
                    // Technically a DOM id cannot start with an integer, so we prefix
                    // a string. This can also be useful if you have multiple tables
                    // to ensure that the id is unique with a different prefix
                    return 'row_'.$d;
                }
            ),
            array( 'db' => 'id',  'dt' => 'id' ),

            array( 'db' => 'firstname',  'dt' => 'firstname' ),

            array( 'db' => 'lastname',   'dt' => 'lastname' ),

            array( 'db' => 'email',   'dt' => 'email' ),

            array( 'db' => 'role',   'dt' => 'role' ),

            array( 'db' => 'password',   'dt' => 'password' ),
        );
        echo json_encode(SSP::simple( $_GET, $this->sql_details, $this->table, $this->primaryKey, $this->columns));
    }
    
}