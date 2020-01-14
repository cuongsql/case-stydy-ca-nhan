<?php
class InotesDB
{
    protected $conn;

    public function __construct($connect) {
        $this->conn = $connect;
    }

    public function getIndex()
    {
        $sql = "SELECT n.id, n.title, nt.name FROM notes n
        INNER JOIN note_type nt
        ON n.type_id = nt.id";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];

        foreach ($result as $item){
            $note = new Note($item['title'], $item['content'], $item['name']);
            array_push($arr, $note);
            $note->setId($item['id']);
        }
        return $arr;
    }

    public function getNoteType()
    {
        $sql = "SELECT * FROM note_type";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];

        foreach ($result as $item){
            $noteType = new NoteType($item['name'], $item['description']);
            array_push($arr, $noteType);
            $noteType->setId($item['id']);
        }
        return $arr;
    }

    public function getAddNote($note)
    {
        $title = $note->getTitle();
        $content = $note->getContent();
        $type_id = $note->getType_id();
        $sql = "INSERT INTO notes (id, `title`, `content`, `type_id`) 
                VALUE (null, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$title, $content, $type_id]);
    }

    public function getEditNote($note, $id)
    {
        $title = $note->getTitle();
        $content = $note->getContent();
        $type_id = $note->getType_id();
        $sql = "UPDATE notes 
                SET `title` = ?, `content` = ?, `type_id` = ?
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$title, $content, $type_id, $id]);
    }

    public function getDeleteNote($id)
    {
        $sql = "DELETE FROM notes WHERE id = $id";
        $stmt = $this->conn->query($sql);
        $stmt->fetchAll();
    }

    public function getValueNote($id)
    {
        $sql = "SELECT n.id, n.title, n.content, nt.name, n.type_id FROM notes n
        INNER JOIN note_type nt
        ON n.type_id = nt.id
        WHERE n.id = $id";

        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $note = new Note($result[0]['title'], $result[0]['content'], $result[0]['type_id']);
        $note->setId($item[0]['id']);
        return $note;
    }
}