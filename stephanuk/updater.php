<?php
// File Security Check
if (!defined('ABSPATH')) {
	exit;
}


require_once TRYDUS_INC_DIR . '/lib/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://update.grayic.com?action=get_metadata&slug=trydus',
    __FILE__, //Full path to the main plugin file or functions.php.
    'trydus'
);