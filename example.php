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

    // use Irebit\Wechat\Alias;
    
    require_once(__DIR__ . DIRECTORY_SEPARATOR . "autoload.php");


    $appId = 'wxd05f23b6b6dd3ae1';
    $appSecret = 'aa710dc555e8944ae99220c51226b7e2';

    // $server = new \Irebit\Wechat\Server($appId, $appSecret);
    // $server->Auth();

    $alias = new Irebit\Wechat\Alias();
    $alias->register();

    $Auth = new WechatAuth($appId, $appSecret);

    // echo Configs::AUTH_BASE_URI;


    