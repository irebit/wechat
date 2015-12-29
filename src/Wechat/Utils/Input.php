<?php
/**
 * Input.php
 *
 * Part of Wechat.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Irebit\Wechat\Utils;

class Input
{
	protected $input;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->input = array_merge($_GET, $_POST);
    }

	public function get($key, $default = '')
	{
		return isset($this->input[$key]) ? $this->input[$key] : $default;
	}
}
