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
 * Название переменной - запоминает ID юзера, чей реф
 */
$config['cookie_key'] = 'user_ref_id';
/**
 * Название переменной - пишется после регистрации, если юзали реф
 */
$config['cookie_key_reg'] = 'user_ref_used';

/**
 * Название action (из таблицы роутера) на который перенаправляет реф.ссылка 
 *   например: login, index, blog, blog/new
 */
$config['redirect_action'] = 'registration';

return $config;
