<?php
class User extends Model
{
    protected $table = "user";

    public static function get($login, $password)
    {
        $connection = context::getConnection()->get();

        $sql = "SELECT * FROM user where login=? and password=?";

        $stmt = $connection->prepare($sql);
        $password = sha1($password);
        $stmt->bind_param('ss', $login, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            return $row;
        }

        return false;
    }

    public static function getUsers()
    {
        $connection = context::getConnection()->get();
        $sql = "SELECT * FROM user";
        $result = $connection->query($sql);
        $res = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $res[] = $row;
            }
        }
        return $res;
    }
}
