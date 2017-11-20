<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
define('DATABASE', 'np549');
define('USERNAME', 'np549');
define('PASSWORD', 'X7bBAA4xP');
define('CONNECTION', 'sql2.njit.edu');

class Manage {
    public static function autoload($class) {
        //you can put any file name or directory here
        include $class . '.php';
    }
}
spl_autoload_register(array('Manage', 'autoload'));

$obj = new main();
class main
{
    
  public function __construct()
 {
   $text = ""; 

   $text .= "<h1>Displaying the data for Accounts Table </h1>";
   $text .= "<h2>Select All Records</h2>";
   $records = accounts::findAll();
   $text .= htmlForm::createTable($records);

  $text .= "<h1>Select One Record</h1>";
  $id = '2';
  $text .= "<h2>Record for ID ".$id."</h2>";
  $records = accounts::findOne($id);
  $text .= htmlForm::createTableforOneEntry($records);

  $text .= "<h1>Insert one record</h1>";
  $text .= "<h1>Inserting a record for id 14</h1>";
  $record = new account();
  $record->email="abcpqr@njit.edu";
  $record->fname="ABC";
  $record->lname="PQR";
  $record->phone="9876543210";
  $record->birthday="01-08-1994";
  $record->gender="male";
  $record->password="123456";
  $record->save();
  $records = accounts::findAll();
  $text .= htmlForm::createTable($records);


  $text .= "<h1>Update one record</h1>";
  $text .= "<h1>Updating the record for id 14</h1>";
  $record = new account();
  $record->id='14'; 
  $record->email="xyzpqr@njit.edu";
  $record->fname="XYZ";
  $record->lname="PQR";
  $record->phone="9876543210";
  $record->birthday="01-08-1994";
  $record->gender="female";
  $record->password="123456";
  $record->save();
  $text .= "<h2>Record for ID 14</h2>";
  $id = '14';
  $records = accounts::findOne($id);
  $text .= htmlForm::createTableforOneEntry($records);
  

  $text .= "<h1>Delete one record</h1>";
  $text .= "<h1>Deleting for the record for id 14</h1>";
  $record=new account();
  $record->id=14;
  $record->delete();
  $records = accounts::findAll();
  $text .= htmlForm::createTable($records);

  $text .= "---------------------------------------------------------------------------------------------------------------";

  $text .= "<h1>Displaying the data for todo Table </h1>";
  $text .= "<h2>Select All Records</h2>";
  $records = todos::findAll();
  $text .= htmlForm::createTable($records);

  $text .= "<h1>Select One Record</h1>";
  $id = '3';
  $text .= "<h2>Record for ID ".$id."</h2>";
  $id = '3';
  $records = todos::findOne($id);
  $text .= htmlForm::createTableforOneEntry($records);

  $text .= "<h1>Insert one record</h1>";
  $text .= "<h1>Inserting a record for id 14</h1>";
  $record = new todo();
  $record->id='';
  $record->owneremail='abcpqr@gmail.com';
  $record->ownerid='16';
  $record->createddate='2017-09-09 00:00:00';
  $record->duedate='2017-10-10 00:00:00';
  $record->message='insert Record';
  $record->isdone='0';
  $record->save();
  $records = todos::findAll();
  $text .= htmlForm::createTable($records);


  $text .= "<h1>Update one record</h1>";
  $text .= "<h1>Updating the record for id 14</h1>";
  $record = new todo();
  $record->id=14;
  $record->owneremail='xyz@gmail.com';
  $record->ownerid='2';
  $record->createddate='2017-07-07 00:00:00';
  $record->duedate='2017-08-08 00:00:00';
  $record->message='Active Record update';
  $record->isdone='1';
  $record->save();
  $id = '14';
  $records = todos::findOne($id);
  $text .= htmlForm::createTableforOneEntry($records);
 

  $text .= "<h1>Delete one record</h1>";
  $text .= "<h1>Deleting for the record for id 14</h1>";
  $record=new todo();
  $record->id=14;
  $record->delete();
  $records = todos::findAll();
  $text .= htmlForm::createTable($records);


htmlForm::displayHTML($text);
//print_r($records);

}

}

