<?php
/*-------------------------------------------------------
*
*	Plugin name:	Refuser
*	Author:			Chiffa
*	Web:			http://goweb.pro
*
---------------------------------------------------------
*/

class PluginRefuser_ModuleRef_EntityRef extends EntityORM {

	protected $aRelations = array(
		'user' => array(self::RELATION_TYPE_BELONGS_TO, 'ModuleUser_EntityUser', 'user_id'),
		'user_from' => array(self::RELATION_TYPE_BELONGS_TO, 'ModuleUser_EntityUser', 'user_from_id')
	);

}
