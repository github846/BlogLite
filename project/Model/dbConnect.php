<?php

class DB
{
/*
    *   Connecting to the database requires an instance of PDO. 
    *   It requires the address, database and user names, and
    *   the password. 
*/
    public static function accessDB()
    {
        try
        {
            $DataObject = new PDO('mysql:host=localhost;dbname=projectdb', 'root', 'root');
            $DataObject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /*echo '<span class="notice">Connected to database</span>';*/
            return $DataObject;
        }
        catch (Exception $Error)
        {
            die ('Not connected to database <br>'. $Error->getMessage());
        }
    }
}