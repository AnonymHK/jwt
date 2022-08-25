
## 描述

JSON Web Token（JWT）是一个非常轻巧的规范。这个规范允许我们使用JWT在用户和服务器之间传递安全可靠的信息。


## 安装JWT

在项目的composer.json文件中，添加：

```
{
    "require": {
        "anonymhk/jwt": "dev-master"
    }
}
```

配置好后，执行composer update更新操作即可。

## 配置文件
我们需要在配置文件中追加以下配置：

```
  /**
   * 扩展类库 - JWT扩展
  */
 'key' => 'secret',
```

## 入门使用
```

//jwt扩展
$jwt = new \AnonymHK\JWT\Lite(config('app.jwt.key'));


常用基础操作(具体API可以查阅代码中src/Lite.php)

```

```
// 生成JWT
$jwt->encodeJwt($payload);

// 从header中获取AUTHORIZATION验证

$jwt->decodeJwt();
// 传入JWT验证
$jwt->decodeJwtByParam($token);
```
