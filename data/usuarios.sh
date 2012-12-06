#! /bin/bash
# carga de usuarios

php app/console fos:user:create callcenter noimporta@example.com cc123456
php app/console fos:user:promote callcenter ROLE_REGISTRADOR_CALLCENTER

php app/console fos:user:create twitter noimporta2@example.com twitter456
php app/console fos:user:promote twitter ROLE_REGISTRADOR_TWITTER

php app/console fos:user:create ccc1 ccc1@example.com ccc1123
php app/console fos:user:promote ccc1 ROLE_COORD_CALLCENTER

php app/console fos:user:create ccc2 ccc2@example.com ccc2456
php app/console fos:user:promote ccc2 ROLE_COORD_CALLCENTER

php app/console fos:user:create ccc3 ccc3@example.com ccc3789
php app/console fos:user:promote ccc3 ROLE_COORD_CALLCENTER

php app/console fos:user:create ctwitter ct@example.com ctwitter1123
php app/console fos:user:promote ctwitter ROLE_COORD_TWITTER

php app/console fos:user:create cfiltro cf@example.com cfiltro2456
php app/console fos:user:promote cfiltro ROLE_COORD_FILTRO

php app/console fos:user:create ccanalizacion cc@example.com coordinadorfiltro2456
php app/console fos:user:promote ccanalizacion ROLE_COORD_CANALIZACION

php app/console fos:user:create canalizacion1 c1@example.com canalizacion159
php app/console fos:user:promote canalizacion1 ROLE_CANALIZADOR1

php app/console fos:user:create canalizacion2 c2@example.com canalizacion267
php app/console fos:user:promote canalizacion2 ROLE_CANALIZADOR2

php app/console fos:user:create canalizacion3 c3@example.com canalizacion348
php app/console fos:user:promote canalizacion3 ROLE_CANALIZADOR3

php app/console fos:user:create canalizacion4 c4@example.com canalizacion483
php app/console fos:user:promote canalizacion4 ROLE_CANALIZADOR4

php app/console fos:user:create canalizacion5 c5@example.com canalizacion591
php app/console fos:user:promote canalizacion5 ROLE_CANALIZADOR5

php app/console fos:user:create filtro1 f1@example.com filtro147
php app/console fos:user:promote filtro1 ROLE_FILTRO1

php app/console fos:user:create filtro2 f2@example.com filtro268
php app/console fos:user:promote filtro2 ROLE_FILTRO2

php app/console fos:user:create filtro3 f3@example.com filtro397
php app/console fos:user:promote filtro3 ROLE_FILTRO3

php app/console fos:user:create filtro4 f4@example.com filtro464
php app/console fos:user:promote filtro4 ROLE_FILTRO4

php app/console fos:user:create filtro5 f5@example.com filtro551
php app/console fos:user:promote filtro5 ROLE_FILTRO5

echo creando usuario admin
php app/console fos:user:create admin admin@example.com
php app/console fos:user:promote admin ROLE_ADMIN

echo creando usuario superadmin
php app/console fos:user:create superadmin superadmin@example.com
php app/console fos:user:promote superadmin --super