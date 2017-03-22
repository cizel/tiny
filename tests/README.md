- 测试的用例文件放在 tests/library/ 中,例如 tests/library/ConfigTest.php
- 执行测试配置 tests/phpunit.xml
```
        <testsuite name="config">
            <file>library/ConfigTest.php</file>
        </testsuite>
```
- 启动 Application 后执行的命令，需要在 开发环境（docker） 中执行
    - 需要在开发环境（docker）中安装phpunit `cp phpunit /usr/local/bin/phpunit`