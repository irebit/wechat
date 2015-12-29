<?php
    /**
     * Auth.php
     *
     * Part of 
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     *
     * @author    afternoon <xiaxianmao@cyou-inc.com>
     * @copyright cyou.com
     * @date      2015-12-29
     * @link      
     */
    use Irebit\Wechat\Configs;

    namespace Irebit\Wechat;

    class Auth{
        /**
         * wechat APPID
         * @var string
         */
        protected $appId;

        /**
         * wechat APPSECRET
         * @var string
         */
        protected $appSecret;

        /**
         * construct
         * @var string $appId
         * @var string $appSecret
         */
        public function __construct($appId, $appSecret)
        {
            $this->appId = $appId;
            $this->appSecret = $appSecret;
        }
    }
