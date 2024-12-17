<?php

class Model {
    protected $db;
    protected $table;

    public function __construct($table) {
        $this->db = new Database();
        $this->table = $table;
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM {$this->table}");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $id = $this->db->escape($id);
        $result = $this->db->query("SELECT * FROM {$this->table} WHERE id = '$id'");
        return $result->fetch_assoc();
    }

    public function insert($data) {
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_map(fn($value) => "'".$this->db->escape($value)."'", array_values($data)));
        $this->db->query("INSERT INTO {$this->table} ($columns) VALUES ($values)");
    }

    public function update($id, $data) {
        $id = $this->db->escape($id);
        $updates = implode(',', array_map(fn($key, $value) => "$key='".$this->db->escape($value)."'", array_keys($data), $data));
        $this->db->query("UPDATE {$this->table} SET $updates WHERE id = '$id'");
    }

    public function delete($id) {
        $id = $this->db->escape($id);
        $this->db->query("DELETE FROM {$this->table} WHERE id = '$id'");
    }
}
