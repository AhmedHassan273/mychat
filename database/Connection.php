<?php

class Connection
{
    /**
     * Create a new PDO connection.
     *
     */
    public static function make()
    {
        try {
            return new PDO('mysql:host=127.0.0.1;dbname=chat_app', 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
