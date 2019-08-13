# XyunDown
#### 简单下载站
##### 简洁、轻量

演示站：[幸运云资源站](http://www.4698888.com.cn "幸运云资源站")

------------

## 安装方法

> 安装之前，先配置服务器环境
> 建议使用 Nginx + PHP 5.4 + MySQL
> PHP版本必须使用 5.x

### PHP版本必须使用 5.x

1. 将所有文件上传至网站**根目录**

2. 新建数据库

3. 将根目录下的 `XyunDown.sql` 导入到刚才新建的数据库

4. 修改配置文件 `/root/config/config.php`，将
```
$config['base_url'] = 'http://xyundown.com/';
```
中的URL地址换成你自己的URL地址
#### 注意在URL地址后面一定要加 `/` 

5. 修改配置文件 `/root/config/database.php`
```
$db['default']['hostname'] = 'localhost';		//MySQL服务器地址
$db['default']['username'] = 'root';			//MySQL服务器用户名
$db['default']['password'] = 'root';			//MySQL服务器密码
$db['default']['database'] = 'down';			//MySQL数据库名
```
把这四行改成你自己的数据库信息

6. 配置伪静态
需要在使用之前配置伪静态，伪静态规则就是WordPress的伪静态规则
这里的是Nginx的WordPress伪静态规则
```
location /
{
    try_files $uri $uri/ /index.php?$args;
}
rewrite /wp-admin$ $scheme://$host$uri/ permanent;
```
如果你的服务端是Apache，那么伪静态规则应该是
```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond $1 !^(index\.php|images|robots\.txt)
RewriteRule ^(.*)$ index.php/$1 [L]
```
我已经把这个规则写进`.htaccess` 文件里了
#### 同时要注意PHP版本必须是5.x，建议使用PHP 5.4

7. 默认管理员用户名admin密码admin
8. 大家可以根据自己的需要修改页面外观
```
页脚文件：/root/views/footer.php
顶部文件：/root/views/header.php
```
有需要的话可以添加评论系统
XyunDown自带Gitment评论系统
评论系统在`/root/views/view.php`中可以进行编辑
Gitment详细使用方法请参考
[使用 GitHub Issues 搭建评论系统](https://imsun.net/posts/gitment-introduction/ "使用 GitHub Issues 搭建评论系统")
这篇文章
9. 大家还可以自己研究研究数据库
```
数据库：
hbdx_baseinfo是基本信息
hbdx_blue是文件信息
hbdx_tag是标签信息
hbdx_users是用户信息（密码采用md5加密）
```

#### 感谢阅读本文，如有错误，请大家批评指正！
