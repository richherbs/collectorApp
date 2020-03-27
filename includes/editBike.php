<?php
    if(!defined('SAFETORUN')){
        echo 'You can\'t run this file on its own.';
        die;
    }

    /**
     * Returns the value of the bike which is to be deleted
     *
     * @return integer
     */
    function editClick() : int {
        return (int) $_GET['edit'];
    }

    /**
     * Pull the details of the bike to edit out of the database
     *
     * @param integer $bikeToEdit
     * @param PDO $aDBConn
     * @return array
     */
    function populateEditForm(int $bikeToEdit, PDO $aDBConn) : array{
        // prepare
        $query = $aDBConn->prepare("SELECT bikes.id, brand.brand_name, bikes.model, discipline.discipline_name, wheelSize.wheel_diameter
        FROM bikes
        INNER JOIN brand ON brand.id = bikes.brand_ID
        INNER JOIN discipline ON discipline.id = bikes.discipline_ID
        INNER JOIN wheelSize ON wheelSize.id = bikes.wheelSize_ID
        WHERE bikes.id = :bikeToEdit
        ");

        // execute
        $query->execute(['bikeToEdit' => $bikeToEdit]);

        $result = $query->fetchAll();
        return $result;
    }

    /**
     * Sets the deleted flag to true in the db
     *
     * @param integer $aBikeID
     * @param PDO $aDBConn
     * @return boolean
     */
    function editQuery(int $aBikeID, int $make, string $model, int $discipline, int $wheelsize, $aDBConn) : bool{
        // prepare
        $query = $aDBConn->prepare("UPDATE bikes
                                    SET brand_ID = :make, model = :model, discipline_ID = :discipline, wheelSize_ID = :wheelsize
                                    WHERE id = :aBikeID
                                    ");

        // execute
        $query->execute(['aBikeID'=>$aBikeID, 'make'=>$make, 'model'=>$model, 'discipline'=>$discipline, 'wheelsize'=>$wheelsize]);

        return true;
    }

    if(isset($_GET['edit'])){
        $bikeToEdit = editClick();
        $theBike = populateEditForm($bikeToEdit, $db);
    } 
    
    if (isset($_POST['updateBike'])){
        $bikeToEdit = editClick();
        $make = (int) $_POST['brand'];
        $model = $_POST['model'];
        $discipline = (int) $_POST['discipline'];
        $wheelsize = (int) $_POST['wheelsize'];
        if(array_key_exists($make, selectorQuery($db, 'brand_name', 'brand')) && !empty($model) && array_key_exists($discipline, selectorQuery($db, 'discipline_name', 'discipline')) && array_key_exists($wheelsize, selectorQuery($db, 'wheel_diameter', 'wheelSize'))){
            echo 'success!';      
            editQuery($bikeToEdit, $make, $model, $discipline, $wheelsize, $db);
            echo '<script>window.location = "index.php"</script>';
        } else {
            echo 'Please make sure you make valid selections!';
        }
    }
