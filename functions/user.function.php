<?php
include("../classes/Database.class.php");
class User extends Database
{
    function getAllUsers()
    {
        $insertUser = $this->insert("INSERT INTO `users`(`name`,`age`)VALUES(?,?)", ['John Doe', 24]);
        if ($insertUser) {
            return "Inserted successfully";
        } else {
            return "Failed! inserted";
        }
    }
    function addUser()
    {

    }
    function getUser()
    {

    }
    function updateUser()
    {

    }
    function deleteUser()
    {

    }
}
