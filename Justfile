set dotenv-load := false
set positional-arguments

export COLUMNS := '550'

default:
  @just --list

php := "/usr/bin/php7.4"
composer := "/usr/bin/php7.4 /usr/local/bin/composer"

cli *args='':
    {{ php }} bin/console "$@"

phpstan *args='':
    {{ php }} vendor/bin/phpstan "${@}"

watch-phpstan *args='':
    find hamcrest/ tests/ -name '*.php' | entr {{ php }} vendor/bin/phpstan "${@}"

setup-phpunit:
    cp tests/phpunit.xml.dist phpunit.xml
    sed -i 's|bootstrap="bootstrap\.php"|bootstrap="tests/bootstrap.php"|g; s|<directory suffix="\.php">../hamcrest</directory>|<directory suffix=".php">hamcrest</directory>|g; s|<directory suffix="Test\.php">\.</directory>|<directory suffix="Test.php">tests/</directory>|g' phpunit.xml

phpunit *args='':
    {{ php }} vendor/bin/phpunit "${@}"

composer *args='':
    {{ composer }} "${@}"

units:
    j phpunit --exclude-group=integration

prep:
    j phpstan
    j phpunit
