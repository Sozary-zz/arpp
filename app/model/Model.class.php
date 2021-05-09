<?php
class Model
{
    protected static $table;
    protected $data = [];
    private $columns = [];

    public function __construct($elements = [])
    {
        $this->update = $elements != [];

        foreach ($elements as $key => $value) {
            $this->$key = $value;
        }
        $this->initColumns();
    }

    private function initColumns()
    {
        $sql = "SHOW COLUMNS FROM " . DB . "." . static::$table;
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

    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function save()
    {
        if (!$this->columns) {
            $this->initColumns();
        }

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

        if ($this->update) {
            $sql = 'UPDATE ' . static::$table . ' SET ' . implode(',', array_map(function ($data) {
                return $data['column'] . ' = ?';
            }, $dataToSend)) . ' where id = ' . $this->event_id . ';';
        } else {
            $sql = 'INSERT INTO ' . static::$table . ' (' . implode(',', array_map(function ($data) {
                return $data['column'];
            }, $dataToSend)) . ') VALUES (' . implode(',', array_map(function ($_) {
                return '?';
            }, $dataToSend)) . ')';
        }
        $stmt = $connection->prepare($sql);
        $paramsType = implode('', array_map(function ($data) {
            return $data['type'];
        }, $dataToSend));

        $stmt->bind_param($paramsType, ...array_map(function ($data) {
            return $data['value'];
        }, $dataToSend));

        $stmt->execute();

        return $stmt->insert_id;
    }
}
