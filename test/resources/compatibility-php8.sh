
#!/bin/sh

# require new version of phpunit and phpcpd, as the old ones are incompatible with php8
# (note: cannot generally require the new ones as these are not compatible with php 5)
composer require phpunit/phpunit:8.* sebastian/phpcpd:* --ignore-platform-reqs --with-all-dependencies

# disable cpd for now, as newer version fails with duplicated code
sed -i 's/, cpd//g' build.xml

# phpunit compatiblity of new versions (requires return type declaration)
sed -i 's/function setUp()/function setUp() : void/g' test/*/*.php

# phpunit xml compatiblity, delete deprecated flag
sed -i 's/mapTestClassNameToCoveredClassName="false"//g' test/resources/phpunit.xml

# phpunit disable stop on risky, as risky test functions are being used
sed -i 's/stopOnRisky="true"//g' test/resources/phpunit.xml
