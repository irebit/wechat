<?php
    /**
     * Server.php
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

    class Server
    {
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

        public function __call($method, $args)
        {
            // echo $method;
        }


    }