#!/usr/bin/env bash

# cs === coding standards
#
# MAINTAINER: wlodzimierz.gajda@edulab.io
#

set -o errexit -o nounset -o pipefail

rm -rf .php_cs.cache

./bin/php-cs-fixer -vv fix

# vim:ts=4:sw=4:et:syn=sh:
