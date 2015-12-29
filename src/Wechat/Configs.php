<?php
    /**
     * Configs.php
     *
     * Part of Wechat
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     *
     * @author    afternoon <xiaxianmao@cyou-inc.com>
     * @copyright cyou.com
     * @date      2015-12-29
     * @link      
     */

    namespace Irebit\Wechat;

    class Configs
    {
        /**
         * 设置微信相关的配置常量
         */
        const AUTH_URL = 'https://open.weixin.qq.com/connect/oauth2/authorize';
        const AUTH_TOKEN_URL =   'https://api.weixin.qq.com/sns/oauth2/access_token';
        const AUTH_REFRESH_URL = 'https://api.weixin.qq.com/sns/oauth2/refresh_token';
        const AUTH_USERINFO_URL = 'https://api.weixin.qq.com/sns/userinfo';
        const AUTH_CHECKTOKEN_URL = 'https://api.weixin.qq.com/sns/auth';
        

    }

    