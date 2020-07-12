<?php

/**
 * Description of permission
 *
 * @author dumidu
 */
class permission {

    public function __construct() {

    }

    /**
     * This function find whether current user has permission
     *
     * @return boolean true if logged else false
     */
    public function hasPermission($permission) {
        $permissionArray = json_decode(PERMISSION, true);
        $roleId = (isset($_SESSION['adminUser']['type'])) ? intval($_SESSION['adminUser']['type']) : '0';
        if (isset($permissionArray[$roleId])) {
            $perm = $permissionArray[$roleId];
            return in_array($permission, $perm);
        } else {
            return false;
        }
    }

}

?>
