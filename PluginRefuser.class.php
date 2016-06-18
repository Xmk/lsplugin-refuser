<?php
/*-------------------------------------------------------
*
*	Plugin name:	Refuser
*	Author:			Chiffa
*	Web:			http://goweb.pro
*
---------------------------------------------------------
*/

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
	die('Hacking attemp!');
}

class PluginRefuser extends Plugin {

	protected $aInherits = array(
		'action' => array(
			'ActionRegistration'
		)
	);

	/**
	 * Активация плагина
	 */
	public function Activate() {
		if (!$this->isTableExists('prefix_user_ref')) {
			$this->ExportSQL(dirname(__FILE__).'/sql/install.sql');
		}
		return true;
	}

	/**
	 * Инициализация плагина
	 */
	public function Init() {
		/**
		 * Подключаем CSS
		 */
		$this->Viewer_AppendStyle(Plugin::GetTemplatePath(__CLASS__).'css/ref.css?v=1');
		/**
		 * Подключаем JS
		 */
		$this->Viewer_AppendScript(Plugin::GetTemplatePath(__CLASS__).'js/ref.js?v=1');

		$this->Viewer_Assign('sPathRef', rtrim(Plugin::GetWebPath(__CLASS__),'/'));
	}

}
