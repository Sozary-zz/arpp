<?php
class Formation extends Model
{
    protected static $table = "formation";

    public static function deleteById($id)
    {
        $elem = static::getById($id);
        $connection = context::getConnection()->get();
        $sql = "DELETE FROM " . static::$table . " WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        Event::deleteById($elem['event_id']);
    }

    public static function getById($id)
    {
        $connection = context::getConnection()->get();
        $sql = "SELECT *, " . static::$table . ".id as 'id' FROM " . static::$table . " JOIN event WHERE " . static::$table . ".event_id = event.id AND " . static::$table . ".id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            return array_merge($row, ['type' => 'formation']);
        }
        return null;
    }

    public static function getFormations()
    {
        $connection = context::getConnection()->get();
        $sql = "SELECT *, " . static::$table . ".id as 'id' FROM " . static::$table . " JOIN event WHERE " . static::$table . ".event_id = event.id ";
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
