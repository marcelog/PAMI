
#!/bin/sh

composer require phpunit/phpunit:8.* sebastian/phpcpd:* --ignore-platform-reqs --with-all-dependencies
# disable cpd for now, as newer version fails with duplicated code
sed -i 's/, cpd//g' build.xml
sed -i 's/function setUp()/function setUp() : void/g' test/*/*.php
