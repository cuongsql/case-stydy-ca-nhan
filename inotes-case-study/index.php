<?php
include_once 'header.php';
$inotesManager = new InotesManager();

$page = isset($_GET['page']) ? $_GET['page'] : null;

switch($page){
    case 'detailNote':
        $inotesManager->detailNote();
        break;
    case 'addNote':
        $inotesManager->addNote();
        break;
    case 'editNote':
        $inotesManager->editNote();
        break;
    case 'deleteNote':
        $inotesManager->deleteNote();
        break;
default:
    $inotesManager->index();
}

include_once 'footer.php';