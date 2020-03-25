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
        $query = $aDBConn->prepare("SELECT bikes.id, brand.brand_name, bikes.model, discipline.discipline_name, wheelSize.wheel_diameter, bikes.pic_url
        FROM bikes
        INNER JOIN brand ON brand.id = bikes.brand_ID
        INNER JOIN discipline ON discipline.id = bikes.discipline_ID
        INNER JOIN wheelSize ON wheelSize.id = bikes.wheelSize_ID
        WHERE id = :bikeToEdit
        ");

        // execute
        $query->execute(['bikeToEdit' => $bikeToEdit]);

        return $query->fetch();
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
        populateEditForm($bikeToEdit, $db);
    } elseif (isset($_GET['updateBike'])){
        $make = $_POST['make'];
        $model = $_POST['model'];
        $discipline = $_POST['discipline'];
        $wheelsize = $_POST['wheelsize'];
        editQuery(editClick(), $make, $model, $discipline, $wheelsize, $db);
    }