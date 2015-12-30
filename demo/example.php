<?php
    /**
     * Server.php
     *
     * Part of projectname
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     *
     * @author    afternoon <xiaxianmao@cyou-inc.com>
     * @copyright cyou.com
     * @date      2015-12-29
     * @link      
     */

    require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "autoload.php");


    $appId = 'wxd05f23b6b6dd3ae1';
    $appSecret = 'aa710dc555e8944ae99220c51226b7e2';

    $alias = new Irebit\Wechat\Alias();
    $alias->register();

	$to = UtilsUrl::current();

	$arr = UtilsArr::add(array(), 1, 2);
	var_dump($arr);exit;
    $auth = new WechatAuth($appId, $appSecret);
	$user = $auth->authorize($to, 'snsapi_base');
	echo "<pre>";
	var_dump($user);exit;

    // echo Configs::AUTH_BASE_URI;


    
