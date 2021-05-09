<?php
class Event extends Model
{
    protected static $table = "event";

    public function __construct($elements)
    {
        foreach ($elements as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function deleteById($id)
    {
        $connection = context::getConnection()->get();
        $sql = "DELETE FROM " . static::$table . " WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

    public static function getById($id)
    {
        $connection = context::getConnection()->get();
        $sql = "SELECT * FROM event JOIN event WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            return $row;
        }
        return null;
    }
}
