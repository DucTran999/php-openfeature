<?php
// controllers/UserController.php

require_once "models/User.php";

class UserController {
    public function getUser($id) {
        $user = User::getById($id);

        return $user;   
    }
}
?>
