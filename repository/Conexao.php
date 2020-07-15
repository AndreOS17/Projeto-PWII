<?php 

class Conexao{
    public static function criar():PDO{
        $env = (parse_ini_file('.env')) ? parse_ini_file('.env') : getenv();
        $databasetype = $env["databasetype"];
        $database = $env["database"];
        $server = $env["server"];
        $user = $env["user"];
        $pass = $env["pass"];

        if($databasetype == "mysql"){
            $databaseURL = "host=$server;dbname=$database";
        }
        else{
            $databaseURL = $database;
        }

        return new PDO("$databasetype:$databaseURL", $user, $pass);
    }
}