<?php
/*-------------------------------------------------------
*
*	Plugin name:	Refuser
*	Author:			Chiffa
*	Web:			http://goweb.pro
*
---------------------------------------------------------
*/


class PluginRefuser_ActionRegistration extends PluginRefuse_Inherit_ActionRegistration
{

	protected function EventIndex()
	{
		$sCookieKeyReg = Config::Get('plugin.refuser.cookie_key_reg');
		if (isset($_COOKIE[$sCookieKeyReg])) {
			$this->Message_AddError($this->Lang_Get('plugin.refuser.error_registered_yet'), $this->Lang_Get('error'));
			return Router::Action('error');
		}
		parent::EventIndex();
	}

}
