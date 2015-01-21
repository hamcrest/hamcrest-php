language: php
php:
  - 5.4
  - 5.3

install:
  - composer install

script:
  - mkdir -p build/logs
  - cd tests
  - phpunit --coverage-clover=../build/logs/clover.xml .
  - cd ../

after_script:
  - php vendor/bin/coveralls -v
  - wget https://scrutinizer-ci.com/ocular.phar
  - php ocular.phar code-coverage:upload --format=php-clover build/logs/clover.xml
