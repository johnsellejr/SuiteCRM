<?php
namespace SuiteCRM\Api\V8\Library;

class UtilityLib{

    function getServerInfo()
    {
        require_once('suitecrm_version.php');
        require_once('sugar_version.php');
        require_once('modules/Administration/Administration.php');
        global $sugar_flavor;
        $admin = new \Administration();
        $admin->retrieveSettings('info');
        $ret = array();

        $sugar_version = '';
        if (isset($admin->settings['info_sugar_version'])) {
            $sugar_version = $admin->settings['info_sugar_version'];
        } else {
            $sugar_version = '1.0';
        }
        $ret['server_info'] = array('suite_version' => $suitecrm_version, 'sugar_version'=> $sugar_version);
        return $ret;
    }


}