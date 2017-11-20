<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
define('DATABASE', 'np549');
define('USERNAME', 'np549');
define('PASSWORD', 'X7bBAA4xP');
define('CONNECTION', 'sql2.njit.edu');
class dbConn{
    //variable to hold connection object.
    protected static $db;
    //private construct - class cannot be instatiated externally.
    private function __construct() {
        try {
            // assign PDO object to db variable
            self::$db = new PDO( 'mysql:host=' . CONNECTION .';dbname=' . DATABASE, USERNAME, PASSWORD );
            self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e) {
            //Output error - would normally log this to error file rather than output to user.
            echo "Connection Error: " . $e->getMessage();
        }
    }
    // get connection function. Static method - accessible without instantiation
    public static function getConnection() {
        //Guarantees single instance, if no connection object exists then create one.
        if (!self::$db) {
            //new connection object.
            new dbConn();
        }
        //return connection.
        return self::$db;
    }
}
class collection {
    static public function create() {
      $model = new static::$modelName;
      return $model;
    }
    static public function findAll() {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        echo "table name is -";
        print_r($tableName);
        echo "<br>";
        $sql = 'SELECT * FROM ' . $tableName;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet;     
    }
    static public function findOne($id) {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id =' . $id;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet[0];
    }
}
class accounts extends collection {
    protected static $modelName = 'account';
}
class todos extends collection {
    protected static $modelName = 'todo';
}
class model{
    protected $tableName;
    public function save()
    {
        if ($this->id = '') {
            $sql = $this->insert();
        } else {
            $sql = $this->update();
        }
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
        $tableName = get_called_class();
        $array = get_object_vars($this);
        $columnString = implode(',', $array);
        $valueString = ":".implode(',:', $array);
       echo "INSERT INTO $tableName (" . $columnString . ") VALUES (" . $valueString . ")</br>";
        echo 'I just saved record: ' . $this->id;
    }
    public function insert() {
        $sql = 'sometthing';
        return $sql;
    }
    private function update() {
        $sql = 'sometthing';
        return $sql;
        echo 'I just updated record' . $this->id;
    }
    public function delete() {
        echo 'I just deleted record' . $this->id;
    }

}
class account extends model {
}
class todo extends model {
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;
    public function __construct()
    {
        $this->tableName = 'todos';
	
    }
}
// this would be the method to put in the index page for accounts

echo "accounts findall";
echo "<br>";
$records = accounts::findAll();
$somethin=  model::insert();

echo $somethin;
//print_r($records); //for printing array accounts find all


//for first testing iteration of array
/*echo "<br><hr>";
$rec= $records[0];
foreach ($rec as $r) {
	echo $r;
};
echo "<br><hr>";*/
$i = 0; /* for illustrative purposes only */

$table_str='';
$table_str.="<table style='table-layout:fixed;width:90%' border='1' >";
/*$table_str.="<tr>\n";
$table_str.= "Accounts Findall";
$table_str.="</tr>";
$table_str.="<tr>\n";*/
$table_str.= "<td style=\"word-wrap: break-word\">id</td>";
$table_str.= "<td style=\"word-wrap: break-word\">email</td>";
$table_str.= "<td style=\"word-wrap: break-word\">fname</td>";
$table_str.= "<td style=\"word-wrap: break-word\">lname</td>";
$table_str.= "<td style=\"word-wrap: break-word\">phone</td>";
$table_str.= "<td style=\"word-wrap: break-word\">birthday</td>";
$table_str.= "<td style=\"word-wrap: break-word\">gender</td>";
$table_str.= "<td style=\"word-wrap: break-word\">password</td>";
$table_str .= "</tr>";

foreach ($records as $v) {
	
	$table_str.= "<table style='table-layout:fixed;width:90%' border='1' >";
	$rec= $records[$i];
	$table_str .= "<tr>";
	//echo "$i";
	foreach ($rec as $r)
	{
	//$k= key($rec);
	
	$table_str .= "<td style=\"word-wrap: break-word\">$r</td>";
	};

    $i++;
    $table_str .= "</tr>";
    $table_str .= "</table>";
}
echo "<br><hr>";
print_r($table_str);
echo "<br><hr>";

        

$result = count($records);
echo $result;
echo "<br><hr>";
// this would be the method to put in the index page for todos
echo "todos findall";
echo "<br>";
$records = todos::findAll();
/*print_r($records);
echo "<br><hr>";*/
$i = 0; /* for illustrative purposes only */

foreach ($records as $v) {
	$rec= $records[$i];
	foreach ($rec as $r)
	{
	echo $r;

	};

    $i++;
    echo "<br>";
}

echo "<br><hr>";
//this code is used to get one record and is used for showing one record or updating one record
echo "todo findOne";
echo "<br>";
$record = todos::findOne(2);
print_r($record);
echo "<br><hr>";
foreach ($record as $r) {
	echo $r;
};
echo "<br><hr>";
//this is used to save the record or update it (if you know how to make update work and insert)
echo "accounts save find one";
echo "<br>";
//$record->save();
//$record = accounts::findOne(1);
echo "<br><hr>";
//This is how you would save a new todo item
echo "new todo";
echo "<br>";
$record = new todo();
$record->message = 'some task';
$record->isdone = 0;
echo "<br><hr>";
//$record->save();
echo "todo save";
echo "<br>";

print_r($record);

echo "<br><hr>";
echo "todo create";
echo "<br>";
$record = todos::create();
print_r($record);
echo "<br><hr>";
?>
