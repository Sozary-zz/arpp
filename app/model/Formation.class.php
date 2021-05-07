<?php
class Formation extends Model
{
    protected $table = "formation";

    public static function getFormations()
    {
        $connection = context::getConnection()->get();
        $sql = "SELECT * FROM formation JOIN event WHERE formation.event_id = event.id ";
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
