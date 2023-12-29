<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
- Hướng dẫn chạy project yii2:
    + Trước tiên cần có composer
    + Chạy lệnh ```git clone``` để tải dự án
    + Cd vào dự án rồi chạy lệnh ```init``` để khởi tạo các thông số ban đầu
    + Tạo ```db_name``` trước ở localhost trong phpmyadmin
    + Sửa tên db ở trong ```common/config/main-local.php``` trùng với db ở localhost
    + Sau đó chạy lệnh ```composer install``` để kéo về các thư viện của dự án về project
    + Cuối cùng chạy lệnh ```yii migrate-rbac``` để tạo các bảng thuộc rbac, sau đó chạy lệnh ```yii migrate``` để tạo đầy đủ bảng
    + Cách config dự án chạy local trên XAMPP:
        * Vào Config của Apache
        * Truy cập file theo đường dẫn: ```path\to\xampp\apache\conf\extra\httpd-vhosts.conf```
        * Chỉnh đường dẫn phù hợp với với mẫu sau:
        ```
        <VirtualHost *:80>
            ##ServerAdmin webmaster@hocphp.vn
            DocumentRoot "path\to\my\project"
            <Directory path\to\my\project>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride all
                Order Deny,Allow
                Allow from all
                Require all granted
            </Directory>
            ServerName localhost
            ServerAlias localhost
            ErrorLog "logs/dummy-host.example.com-error.log"
            CustomLog "logs/dummy-host.example.com-access.log" common
        </VirtualHost>
        ```
# basephp
