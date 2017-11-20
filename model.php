<?php
abstract class model {
     protected $tableName;
    public function save()
    {
        if ($this->id == '') {
            $sql = $this->insert();
        } else {
            $sql = $this->update();
        }

        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
     
    }
    private function insert() {
        $modelName=static::$modelName;
        $tableName = $modelName::getTablename();
        $this->id=14;
        $array = get_object_vars($this);
        array_pop($array);
        $columnString = array_keys($array);
        $columnString1=implode(',', $columnString);
        $valueString = "'".implode("','", $array)."'";
        $sql= 'INSERT INTO '.$tableName.' ('.$columnString1.')'.' VALUES '.'('.$valueString.')';
        return $sql;
    }

    private function update() {
        $modelName=static::$modelName;
        $tableName = $modelName::getTablename();
        $array = get_object_vars($this);
        $space = " ";
        $sql = 'UPDATE '.$tableName.' SET ';
        foreach ($array as $key=>$value){
            if( ! empty($value )) {
                $sql .= $space . $key . ' = "'. $value .'"';
                $space = ", ";
            }
        }
        $sql .= ' WHERE id='.$this->id;
        return $sql;
    }


    public function delete() {
        $modelName=static::$modelName;
        $tableName = $modelName::getTablename();
        $sql = 'DELETE FROM '.$tableName.' WHERE id='.$this->id;
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
    }
  
}
?>