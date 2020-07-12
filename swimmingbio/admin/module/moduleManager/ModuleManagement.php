<?php

require_once 'admin_packages.php';
/* global $login;
  global $permission;
  if ($login->isLogged()) {
  if ($permission->hasPermission('MODULE')) {
  if (isset($_GET['action']) && !empty($_GET['action'])) {
  $action = $_GET['action'];
  $moduleManager = new ModuleManager();
  switch ($action) {
  case 'changeChapterStatus' : $moduleManager->changeChapterStatus();
  break;
  }
  }
  }
  } */

class ModuleManager {

    function changeChapterStatus() {

        $chapterId = $_GET['chapterId'];
        $status = $_GET['status'];

        $sql = "UPDATE chapter SET STATUS='$status' WHERE ID='$chapterId'";

        $result = @mysql_query($sql);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    }

    function changeLessonStatus() {
        $lessonId = $_GET['lessonId'];
        $status = $_GET['status'];

        $sql = "UPDATE lesson SET STATUS='$status' WHERE ID='$lessonId'";

        $result = @mysql_query($sql);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    }

    function changeModuleStatus() {
        $moduleId = $_GET['moduleId'];
        $status = $_GET['status'];

        $sql = "UPDATE module SET STATUS='$status' WHERE ID='$moduleId'";

        $result = @mysql_query($sql);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    }

    function changePageStatus() {
        $pageId = $_GET['pageId'];
        $status = $_GET['status'];

        $sql = "UPDATE page SET STATUS='$status' WHERE ID='$pageId'";

        $result = @mysql_query($sql);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    }

    function deletePage() {
        $pageId = $_GET['pageId'];

        $sql = "DELETE FROM page WHERE ID='$pageId'";

        $result = @mysql_query($sql);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    }
    
    function deleteLesson() {
        $lessonId = $_GET['lessonId'];

        $sql = "DELETE FROM lesson WHERE ID='$lessonId'";

        $result = @mysql_query($sql);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    }

    function deleteModule() {
        $moduleId = $_GET['moduleId'];

        $sql = "DELETE FROM lesson WHERE ID='$moduleId'";

        $result = @mysql_query($sql);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    }
}
?>

