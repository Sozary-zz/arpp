<?php
class Colloquium extends Model
{
    protected $table = "colloquium";

    public static function getColloquia()
    {
        $connection = context::getConnection()->get();
        $sql = "SELECT * FROM colloquium JOIN event WHERE colloquium.event_id = event.id ";
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
