<?php
/**
 * Resolve paths. These are useful to change if you want to debug and/or develop
 * in a directory outside of the MODx webroot. They are not required to set
 * for basic usage.
 *
 * @package schedule
 * @subpackage build
 */
function createSetting(&$modx,$key,$value) {
	$ct = $modx->getCount('modSystemSetting',array(
		'key' => 'schedule.'.$key,
	));
	if (empty($ct)) {
		$setting = $modx->newObject('modSystemSetting');
		$setting->set('key','schedule.'.$key);
		$setting->set('value',$value);
		$setting->set('namespace','schedule');
		$setting->set('area','Paths');
		$setting->save();
	}
}
if ($object->xpdo) {
	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
		case xPDOTransport::ACTION_UPGRADE:
			$modx =& $object->xpdo;

			/* setup paths */
			//createSetting($modx,'core_path',$modx->getOption('core_path').'components/schedule/');
			//createSetting($modx,'assets_path',$modx->getOption('assets_path').'components/schedule/');

			/* setup urls */
			//createSetting($modx,'assets_url',$modx->getOption('assets_url').'components/schedule/');
		break;
	}
}
return true;