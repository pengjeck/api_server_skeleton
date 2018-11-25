# api_server_skeleton
php后台开发脚手架，包含基本的数据库、日志、路由、单元测试等内容

## 依赖的库
+ 日志库：[mongolog](https://github.com/Seldaek/monolog)
+ 单元测试：[phpunit](https://github.com/sebastianbergmann/phpunit)
+ 框架：[slim](https://github.com/slimphp/Slim)

## 目录结构
    conf
    |-app
    |-db
      |-blog.ini    // blog数据库配置
    src
    |-common
      |-DbConn.php   // 数据库连接
      |-Log.php      // 日志
    |-service
      |-data
        |-User.php    // 用户数据操作层，dao
      |-page
        |-user
          |-Login.php   // 登陆的api接口
        |-BasePage.php   // api基类
    test
    |-testLogin.php   // phpunit测试样例
    index.php    // 入口文件
    composer.json 
    composer.lock


## common库
+ DbConn  使用mysqli连接数据库
+ log  日志，依赖monolog来进行日志管理

## 如何运行脚手架
要求：php > 5.4
```shell
php -S localhost:8080
// 或者
composer start
```

在浏览器内输入地址：
```url
http://localhost:8080/login?user_name=username&passwd=jkadf即可运行
```

## 脚手架设计安排
1. conf目录下面主要放置了应用的各种配置，其中app目录为应用内特殊逻辑的配置。db目录下面则是数据库连接的基本配置，包括host,port,username,password,database
2. src目录下面放置的则是源码，其中common目录下面为常用的基本库，目前只有数据库连接&日志两个内容，逻辑较为简单，功能也不够丰富，日后会继续完善。而且也会逐渐加入类似时间，http请求等其他库，以简单实用为设计理念；service下面则是业务逻辑处理的代码，data里面的库主要是用于和其他接口或数据库建立数据关联，完成数据在业务层面的增删改查。服务于page，让page可以专注也逻辑而不用过分在意数据层。page则是各种接口，其中BasePage类为一个虚类，要求所有接口都应该继承该类，且需要实现checkParam, checkPermission, run, formatResponse四个函数。
3. test目录下面则是基于phpunit构建的单元测试类
4. index.php文件内容比较简单，主要是实现了一个路由的逻辑

## 其他实践
+ 推荐开发工具：phpstorm
+ 喜欢vim可以在phpstorm装上ideavim，非常酸爽