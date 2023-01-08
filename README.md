# Hyperf3.0 Api脚手架示例

 * 初始化应用
```shell
composer install
cp .env.example .env && php bin/hyperf.php init:application
```

* 运行
```shell
php bin/hyperf.php server:watch
```
* `php-cs-fixer` 安装
```shell

mkdir --parents tools/php-cs-fixer
composer require --working-dir=tools/php-cs-fixer friendsofphp/php-cs-fixer

```
* 代码格式化
```shell
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix app
```