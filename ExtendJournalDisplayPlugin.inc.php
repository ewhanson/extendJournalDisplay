<?php
/**
 * @file plugins/generic/cacheBuster/ExtendJournalDisplayPlugin.inc.php
 *
 * Copyright (c) 2014-2022 Simon Fraser University
 * Copyright (c) 2003-2022 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class CacheBusterPlugin
 * @ingroup plugins_generic_extendjournaldisplay
 *
 * @brief Adds custom css to make journal selection scroll
 */
class ExtendJournalDisplayPlugin extends GenericPlugin {
	/**
	 * @copydoc Plugin::register
	 */
	public function register($category, $path, $mainContextId = null) {
		$success = parent::register($category, $path);
		if ($success && $this->getEnabled()) {
			$request = Application::get()->getRequest();
			$url = $request->getBaseUrl() . '/' . $this->getPluginPath() . '/css/style.css';
			$templateMgr = TemplateManager::getManager($request);
			$templateMgr->addStyleSheet('extendedJournalDisplayStyles', $url, ['contexts' => 'backend']);
		}
		return $success;
	}

	/**
	 * @copydoc PKPPlugin::getDisplayName
	 */
	public function getDisplayName() {
		return __('plugins.generic.extendJournalDisplay.name');
	}

	/**
	 * @copydoc PKPPlugin::getDescription
	 */
	public function getDescription() {
		return __('plugins.generic.extendJournalDisplay.description');
	}
}
