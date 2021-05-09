<?php
class Colloquium extends Model
{
    protected $table = "colloquium";

    public function __construct($elements)
    {
        foreach ($elements as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function getById($id)
    {
        $connection = context::getConnection()->get();
        $sql = "SELECT *,colloquium.id as 'id' FROM colloquium JOIN event WHERE colloquium.event_id = event.id AND colloquium.id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            return array_merge($row, ['type' => 'colloquium']);
        }
        return null;
    }

    public static function getColloquia()
    {
        $connection = context::getConnection()->get();
        $sql = "SELECT *, colloquium.id as 'id' FROM colloquium JOIN event WHERE colloquium.event_id = event.id ";
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
