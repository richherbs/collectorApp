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
    function deletedClick() : int {
        return (int) $_GET['delete'];
    }
    
    /**
     * Sets the deleted flag to true in the db
     *
     * @param integer $aBikeID
     * @param PDO $aDBConn
     * @return boolean
     */
    function deletedQuery(int $aBikeID, PDO $aDBConn) : bool{
        // prepare
        $query = $aDBConn->prepare("UPDATE bikes
                                    SET deleted = '1'
                                    WHERE id = :aBikeID
                                    ");

        // execute
        $query->execute(['aBikeID'=>$aBikeID]);

        return true;
    }

    if(isset($_GET['delete'])){
        $bikeToDelete = deletedClick();
        deletedQuery($bikeToDelete, $db);
    }