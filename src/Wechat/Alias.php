<?php
    /**
     * Alias.php
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

    class Alias
    {
        /**
         * SDK 别名
         * @var array()
         */
        protected static $aliases = array(
                'WechatAuth' => 'Irebit\\Wechat\\Auth'
            );

        /**
         * 是否已经注册过
         *
         * @var bool
         */
        protected static $registered = false;
        
        /**
         * 注册别名
         */
        public static function register()
        {
            if (!self::$registered) {
                foreach (self::$aliases as $alias => $class) {
                    class_alias($class, $alias);
                }
                self::$registered = true;
            }
        }
    }

    