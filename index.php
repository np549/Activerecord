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
   $text .= "<h1 align=\"center\"><u>Active Record Assignment</h1>";

   $text .= "<hr><h3 align=\"center\">Table Name- Accounts</h3><hr>";

   $text .= "<h1>1. Select All Records</h1>";
   $records = accounts::findAll();
   $text .= htmlForm::createTable($records);

  $text .= "<h1>2. Select One Record</h1>";
  $id = '13';
  $text .= "<h3>Selected ID ".$id."</h3>";
  $records = accounts::findOne($id);
  $text .= htmlForm::createTableforOneEntry($records);

  $text .= "<h1>3. Insert one record</h1>";
  $text .= "<h3>Inserting a record for id 14</h3>";
  $text .="</u><b>email</b>- kwilliams@njit.edu          ";
  $text .="<b>fname</b>- k        ";
  $text .="<b>lname</b>- william       ";
  $text .="<b>phone</b>- 8795425812         ";
  $text .="<b>birthday</b>- 01-12-1991         ";
  $text .="<b>gender</b>- male        ";
  $text .="<b>password</b>- 123456        <br><br><u>";
  $record = new account();
  $record->email="kwilliams@njit.edu";
  $record->fname="k";
  $record->lname="william";
  $record->phone="8795425812";
  $record->birthday="01-12-1991";
  $record->gender="male";
  $record->password="123456";
  $record->save();
  $records = accounts::findAll();
  $text .= htmlForm::createTable($records);


  $text .= "<h1>4. Update one record</h1>";
  $text .= "<h1>Updating the record for id 14</h1>";
  $record = new account();
  $record->id='14'; 
  $record->email="new@njit.edu";
  $record->fname="1";
  $record->lname="2";
  $record->phone="54611";
  $record->birthday="01-08-1994";
  $record->gender="female";
  $record->password="123456";
  $record->save();
  $text .= "<h2>Updated ID- 14</h2>";
  $id = '14';
  $records = accounts::findOne($id);
  $text .= htmlForm::createTableforOneEntry($records);

  
  $text .= "<h1>5. Delete one record</h1>";
  $text .= "<h3>Deleted ID- 14</h3>";
  $record=new account();
  $record->id=14;
  $record->delete();
  $records = accounts::findAll();
  $text .= htmlForm::createTable($records);

  $text .= "<hr><h3 align=\"center\">Table Name- TODOs</h3><hr>";
  $text .= "<h1>1. Select All Records</h1>";
  $records = todos::findAll();
  $text .= htmlForm::createTable($records);

  $text .= "<h1>2. Select One todo</h1>";
  $id = '9';
  $text .= "<h3>Record for ID ".$id."</h3>";
  $id = '9';
  $records = todos::findOne($id);
  $text .= htmlForm::createTableforOneEntry($records);

  $text .= "<h1>3. Insert one todo</h1>";
  $text .= "<h3>Inserting new todo ID-14</h3>";
  $text .= "</u><b>id</b>=14     ";
  $text .= "<b>owneremail</b>=kwilliams@gmail.com      ";
  $text .= "<b>ownerid</b>=9     ";
  $text .= "<b>createddate</b>=2017-12-29 00:00:00                ";
  $text .= "<b>duedate</b>=2017-12-30 00:00:00      ";
  $text .= "<b>message</b>=new todo    ";
  $text .= "<b>isdone</b>=0<u><br><br>";
  $record = new todo();
  $record->id='';
  $record->owneremail='kwilliams@gmail.com';
  $record->ownerid='9';
  $record->createddate='2017-12-29 00:00:00';
  $record->duedate='2017-12-30 00:00:00';
  $record->message='new todo';
  $record->isdone='0';
  $record->save();
  $records = todos::findAll();
  $text .= htmlForm::createTable($records);


  $text .= "<h1>4. Update one TODO</h1>";
  $text .= "<h3>Update todo</h3>";
  $record = new todo();
  $record->id=14;
  $record->owneremail='new@gmail.com';
  $record->ownerid='12';
  $record->createddate='2017-11-07 00:00:00';
  $record->duedate='2017-11-08 00:00:00';
  $record->message='Todo update';
  $record->isdone='1';
  $record->save();
  $id = '14';
  $records = todos::findOne($id);
  $text .= htmlForm::createTableforOneEntry($records);
 

  $text .= "<h1>5. Delete one TODO</h1>";
  $text .= "<h3>Deleted id-14</h3>";
  $record=new todo();
  $record->id=14;
  $record->delete();
  $records = todos::findAll();
  $text .= htmlForm::createTable($records);


htmlForm::displayHTML($text);
//print_r($records);

}

}

