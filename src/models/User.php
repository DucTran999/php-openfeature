<?php
// models/User.php

class User {
    private static $users = [
        ["id" => 1, "name" => "John Doe", "email" => "john@example.com"],
        ["id" => 2, "name" => "Jane Smith", "email" => "jane@example.com"],
        ["id" => 3, "name" => "Alice Brown", "email" => "alice@example.com"],
    ];

    public static function getAll() {
        return self::$users;
    }

    public static function getById($id) {
        foreach (self::$users as $user) {
            if ($user["id"] == $id) {
                return $user;
            }
        }
        return null;
    }
}
?>
