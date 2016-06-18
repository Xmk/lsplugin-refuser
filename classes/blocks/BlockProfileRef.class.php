<?php
/*-------------------------------------------------------
*
*	Plugin name:	Refuser
*	Author:			Chiffa
*	Web:			http://goweb.pro
*
---------------------------------------------------------
*/

class PluginRefuser_BlockProfileRef extends Block {

	public function Exec()
	{
		if ( !$oUserProfile = $this->GetParam('user') ) {
			return false;
		}
		$aUserRefs = $this->PluginRefuser_Ref_GetRefItemsByUserFromId($oUserProfile->getId());
		$this->Viewer_Assign('aUserRefs', $aUserRefs);
		$this->Viewer_Assign('oUserProfile', $oUserProfile);
		$this->Viewer_Assign('oUserCurrent', $this->User_GetUserCurrent());
	}

}
