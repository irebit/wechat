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
    namespace Irebit\Wechat;

    use Irebit\Wechat\Configs;
	use Irebit\Wechat\Utils\Http;
	use Irebit\Wechat\Utils\Url;
	use Irebit\Wechat\Utils\Input;


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
		 * Http Object
		 * @var Http
		 */
		protected $http;

		/**
		 * 获取上一次的授权信息
		 *
		 * @var array
		 */
		protected $lastPermission;

		/**
		 * 已授权用户
		 *
		 */
		protected $authorizedUser;

		protected $input;

        /**
         * construct
         * @var string $appId
         * @var string $appSecret
         */
        public function __construct($appId, $appSecret)
        {
            $this->appId = $appId;
            $this->appSecret = $appSecret;
			$this->input = new Input();
			$this->http = new Http();
        }

		/**
		 * 授权
		 * 
		 */
		public function authorize($to = null, $scope = 'snsapi_userinfo', $state = 'STATE')
		{
			if (!$this->input->get('state') && !$this->input->get('code')) {
				$this->redirect($to, $scope, $state);
			}
			return $this->user();

		}

		/**
		 * 直接跳转
		 *  
		 * @param string $to
		 * @param string $scope
		 * @param string $state
		 */
		public function redirect($to = null, $scope = 'snsapi_userinfo', $state = 'STATE')
		{
			header('Location:'.$this->url($to, $scope, $state));
			exit;
		}

		/**
		 * 生成outh URL
		 *
		 * @param string $to
		 * @param string $scope
		 * @param string $state
		 *
		 * @return string
		 */
		public function url($to = null, $scope = 'snsapi_userinfo', $state = 'STATE')
		{
			$to !== null || $to = Url::current();
			$params = array(
				'appid'         => $this->appId,
				'redirect_uri'  => $to,
				'response_type' => 'code',
				'scope'         => $scope,
				'state'         => $state,
			);
			return Configs::AUTH_URL.'?'.http_build_query($params).'#wechat_redirect';
		}

		/**
		 * 获取已授权用户
		 *
		 * @return 
		 */
		public function user()
		{
			$code = $this->input->get('code');
			$permission = $this->getAccessPermission($code);
			if ($permission['scope'] !== 'snsapi_userinfo') {
				$user = array('openid' => $permission['openid']);
			} else {
				$user = $this->getUser($permission['openid'], $permission['access_token']);
			}
			return $this->authorizedUser = $user;
		}

		/**
		 * 获取access token
		 *
		 * @param string $code
		 *
		 * @return array
		 */
		public function getAccessPermission($code)
		{
			$params = array(
				'appid'      => $this->appId,
				'secret'     => $this->appSecret,
				'code'       => $code,
				'grant_type' => 'authorization_code',
			);
			$http_info = $this->http->get(Configs::AUTH_GET_TOKEN, $params);
			return json_decode($http_info['data'], true);
		}

		/**
		 * 获取用户信息
		 *
		 * @param string $openId
		 * @param string $accessToken
		 *
		 * @return array
		 */
		public function getUser($openId, $accessToken)
		{
			$queries = array(
				'access_token' => $accessToken,
				'openid'       => $openId,
				'lang'         => 'zh_CN',
			);
			$url = Configs::AUTH_API_USER.'?'.http_build_query($queries);
			$http_info = $this->http->get($url);
			return json_decode($http_info['data'], true);
		}


    }
