<?php
class InterviewModel
{
    private $table = 'calon_interview';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function insert($data)
    {
        $query = "INSERT INTO $this->table
                  VALUES
                  ('', :nama, :alamat, :jenis_kelamin, :agama, :pekerjaandipilih)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('pekerjaandipilih', $data['pekerjaandipilih']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function update($data)
    {
        $query = "UPDATE $this->table SET
                  nama = :nama, 
                  alamat = :alamat, 
                  jenis_kelamin = :jenis_kelamin, 
                  agama = :agama, 
                  pekerjaandipilih = :pekerjaandipilih
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('pekerjaandipilih', $data['pekerjaandipilih']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function delete($data)
    {
        $query = "DELETE FROM $this->table WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $data);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
