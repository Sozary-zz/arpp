<?php
class Model
{
    protected $table = "";
    protected $data = [];
    private $columns = [];

    public function __construct()
    {
        $sql = "SHOW COLUMNS FROM " . DB . "." . $this->table;
        $connection = context::getConnection()->get();
        $result = $connection->query($sql);
        $this->columns = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->columns[] = ['field' => $row['Field'], 'type' => strpos($row['Type'], 'varchar') !== false ? 's' : 'i'];
            }
        }
        array_shift($this->columns);
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function save()
    {
        $connection = context::getConnection()->get();
        $dataToSend = array_map(function ($column) {
            if (key_exists($column['field'], $this->data)) {
                return [
                    'column' => $column['field'],
                    'value' => $this->data[$column['field']],
                    'type' => $column['type'],
                ];
            }
        }, $this->columns);

        $sql = 'INSERT INTO ' . $this->table . ' (' . implode(',', array_map(function ($data) {
            return $data['column'];
        }, $dataToSend)) . ') VALUES (' . implode(',', array_map(function ($_) {
            return '?';
        }, $dataToSend)) . ')';

        $stmt = $connection->prepare($sql);

        $paramsType = implode('', array_map(function ($data) {
            return $data['type'];
        }, $dataToSend));

        $stmt->bind_param($paramsType, ...array_map(function ($data) {
            return $data['value'];
        }, $dataToSend));

        $stmt->execute();
    }
}
