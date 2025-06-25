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

phpunit *args='':
    {{ php }} vendor/bin/phpunit --config=tests/phpunit.xml "${@}"

composer *args='':
    {{ composer }} "${@}"

phpstan-generate-baseline:
    just phpstan analyse --generate-baseline=tests/phpstan-baseline.neon

prep:
    just phpstan
    just phpunit
