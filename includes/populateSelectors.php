<?php 
    function populateSelector(array $aDBQuery){
        foreach($aDBQuery as $anItem){
            $id = $anItem['id'];
            $name = $anItem['name'];
            echo "<option value='$id'>$name</option><br>";
        }
}