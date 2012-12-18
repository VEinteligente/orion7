#! /bin/bash
# carga de usuarios

rm -fr app/cache
php app/console cache:clear --env=prod --no-debug
chmod -R 777 app/cache/