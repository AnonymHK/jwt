<?php
namespace AnonymHK\JWT;

use AnonymHK\JWT\JWT;
use support\Log;

/**
 * JWT客户端类 JWT_Lite
 *
 * @author twoday
 */

class Lite extends JWT
{
	public static $allowed_algs=array('HS256','HS512','HS384','RS256','RS384','RS512');

    /**
     * 生成JWT
     */
	public function encodeJwt($payload, $key, $alg='HS256',$keyID=null,$head=null) {
		try{
			return JWT::encode($payload,$key,$alg,$keyID,$head);
		}catch(\Exception $e){
			Log::error("Jwt encode fail...{$e->getMessage()}");
		}
		return false;
	}

    /**
     * 从header中获取AUTHORIZATION验证
     */
	public function decodeJwt($key) {
		$rs = array();
		$jwt = '';
		if(isset($_SERVER['HTTP_AUTHORIZATION']) && !empty($_SERVER['HTTP_AUTHORIZATION'])){
			$jwt = $_SERVER['HTTP_AUTHORIZATION'];
		}else{
			return false;
		}
		try{
			$payload = JWT::decode($jwt,$key,self::$allowed_algs);
			return (array)$payload;
		}catch(\Exception $e){
			Log::error("Jwt encode fail...{$e->getMessage()}");			
		}
		return false;
	}

	/**
     * 传入JWT验证
     */
	public function decodeJwtByParam($token, $key){
        try {
            $payload = JWT::decode($token, $key, self::$allowed_algs);
            return (array)$payload;
        }catch(\Exception $e){
			Log::error("Jwt encode fail...{$e->getMessage()}");			
        }
		return false;
    }
}
