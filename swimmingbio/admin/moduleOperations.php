<?php

require_once 'admin_packages.php';
require_once 'module/moduleManager/ModuleManagement.php';
global $login;
global $permission;
if ($login->isLogged()) {

    if ($permission->hasPermission('MODULE')) {
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            $action = $_GET['action'];
            $moduleManager = new ModuleManager();
            switch ($action) {
                case 'changeChapterStatus' :
                    $moduleManager->changeChapterStatus();
                    break;
                case 'changeLessonStatus':
                    $moduleManager->changeLessonStatus();
                    break;
                case 'changeModuleStatus':
                    $moduleManager->changeModuleStatus();
                    break;
                case 'changePageStatus':
                    $moduleManager->changePageStatus();
                    break;
                case 'deletePage':
                    $moduleManager->deletePage();
                    break;
                case 'deleteLesson':
                    $moduleManager->deleteLesson();
                    break;
                case 'deleteModule':
                    $moduleManager->deleteModule();
                    break;
                
            }
        }
    }
}
?>