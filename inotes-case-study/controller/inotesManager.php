<?php
class InotesManager
{
    protected $inotesDB;

    public function __construct() {
        $dbname = "mysql:host=localhost;dbname=inotes;charset=utf8";
        $user = "root";
        $password = "password";
        $db = new DBConnect($dbname, $user, $password);
        $this->inotesDB = new InotesDB($db->connect());
    }

    public function index()
    {
        $note = $this->inotesDB->getIndex();
        include_once 'view/list.php';
    }

    public function detailNote()
    {
        $id = $_GET['id'];
        $value = $this->inotesDB->getValueNote($id);
        include_once 'view/show.php';
    }

    public function addNote()
    {
        $noteType = $this->inotesDB->getNoteType();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $title = $_POST["title"];
            $content =$_POST["content"];
            $type_id =$_POST["type_id"];
        $note = new Note($title, $content, $type_id);
        $this->inotesDB->getAddNote($note);
        header('Location: index.php');
    }
        include_once 'view/add.php';
    }
    
    public function editNote()
    {
        $id = $_GET['id'];
        $value = $this->inotesDB->getValueNote($id);
        $noteType = $this->inotesDB->getNoteType();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $title = $_POST["title"];
            $content =$_POST["content"];
            $type_id =$_POST["type_id"];
        $note = new Note($title, $content, $type_id);
        $this->inotesDB->getEditNote($note, $id);
        header('Location: index.php');
    }
        include_once 'view/edit.php';
    }

    public function deleteNote()
    {
        $id = $_GET['id'];
        $this->inotesDB->getDeleteNote($id);
        header('Location: index.php');
    }
}