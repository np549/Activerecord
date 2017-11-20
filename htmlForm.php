<?php

class htmlForm{
    
    
    public static function createTable($recordSet)
    {
        $htmltable = '<table border="1">';
        foreach($recordSet as $row => $innerArray){
            $htmltable .= '<tr>';
            foreach($innerArray as $innerRow => $value){
                $htmltable .= '<th>' . $innerRow . '</th>';
            }
            $htmltable .= '</tr>';
            break;
        } 
        foreach($recordSet as $row => $innerArray){
            $htmltable .= '<tr>';
            foreach($innerArray as $innerRow => $value){
                $htmltable .= '<td>' . $value . '</td>';
            }
            $htmltable .= '</tr>';
        }
        $htmltable .= '</table><hr>';
        
       return $htmltable;
    }


    public static function createTableforOneEntry($recordSet){
        $tableGen = '<table border="1"><tr>';
        $tableGen .= '<tr>';
        foreach($recordSet as $innerRow => $value){
            $tableGen .= '<th>' . $innerRow . '</th>';
        }
        $tableGen .= '</tr>';
        foreach($recordSet as $value){
            $tableGen .= '<td>' . $value . '</td>';
        }
        $tableGen .= '</tr></table><hr>';
        return $tableGen;
    }

    public static function displayHTML($text)
    {
        $html = "";
        $html .= '<html>';
        $html .= '<body>';
        $html .= $text;
        $html .= '</body></html>';
        echo($html);
    
    }

}
    

?>