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
 * Экшен бработки реферальной ссылки
 *
 */
class PluginRefuser_ActionRef extends ActionPlugin
{

	public function Init()
	{
		if ($this->User_IsAuthorization()) {
			$this->Message_AddErrorSingle($this->Lang_Get('plugin.refuser.error_registered'),$this->Lang_Get('error'));
			return Router::Action('error');
		}
		$this->SetDefaultEvent('set');
	}

	protected function RegisterEvent()
	{
		$this->AddEventPreg('/^.+$/i', array('EventSet', 'set'));
	}


	/**********************************************************************************
	 ************************ РЕАЛИЗАЦИЯ ЭКШЕНА ***************************************
	 **********************************************************************************
	 */

	protected function EventSet()
	{
		/**
		 * Проверяем юзера чей реферал
		 */
		if (!($oUser = $this->User_GetUserByLogin($this->sCurrentEvent))) {
			return parent::EventNotFound();
		}
		/*
		 * Запоминаем чей реферал
		 */
		$sCookieKey = Config::Get('plugin.refuser.cookie_key');
		if (empty($_COOKIE[$sCookieKey])) {
			setcookie($sCookieKey, $oUser->getId(), time()+24*3600, Config::Get('sys.cookie.path'), Config::Get('sys.cookie.host'));
		}
		/*
		 * Редиректим
		 */
		$sRedirectAction = Config::Get('plugin.refuser.redirect_action');
		Router::Location(Router::GetPath($sRedirectAction));
	}

}
