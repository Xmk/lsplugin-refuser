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
 * Регистрация хуков
 *
 */
class PluginRefuser_HookRef extends Hook {

	public function RegisterHook()
	{
		$this->AddHook('registration_after', 'Registration');
		$this->AddHook('template_profile_sidebar_end', 'ProfileWhoisTemplate');
	}

	public function Registration($aParams=array())
	{
		$sCookieKey = Config::Get('plugin.refuser.cookie_key');
		$sCookieKeyReg = Config::Get('plugin.refuser.cookie_key_reg');
		if ( empty($aParams['oUser']) || empty($_COOKIE[$sCookieKey]) ) {
			return false;
		}
		if (isset($_COOKIE[$sCookieKeyReg])) {
			return false;
		}
		if ( !$oUserFrom = $this->User_GetUserById($_COOKIE[$sCookieKey]) ) {
			return false;
		}
		$oUser = $aParams['oUser'];

		$oRefNew = Engine::GetEntity('PluginRefuser_Ref');
		$oRefNew->setUserId($oUser->getId());
		$oRefNew->setUserFromId($oUserFrom->getId());
		$oRefNew->setDate(date('Y-m-d H:i:s'));

		if ($oRefNew->Save()) {
			setcookie($sCookieKeyReg, 1, time()+3600*24*365, Config::Get('sys.cookie.path'), Config::Get('sys.cookie.host'));
			setcookie($sCookieKey, null);
		}
	}

	public function ProfileWhoisTemplate($aParams=array())
	{
		if ( empty($aParams['oUserProfile']) ) {
			return false;
		}
		$oUserProfile = $aParams['oUserProfile'];
		$aUserRefs = $this->PluginRefuser_Ref_GetRefItemsByUserFromId($oUserProfile->getId());
		$this->Viewer_Assign('aUserRefs', $aUserRefs);
		$this->Viewer_Assign('oUserProfile', $oUserProfile);
		$this->Viewer_Assign('oUserCurrent', $this->User_GetUserCurrent());
		return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'blocks/block.profileRef.tpl');
	}

}
