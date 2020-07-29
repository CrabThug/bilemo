# BILEMO for Project 7
[![Maintainability](https://api.codeclimate.com/v1/badges/2e8df1477d4674700339/maintainability)](https://codeclimate.com/github/CrabThug/bilemo/maintainability)

require :
 * symfony : 5
 * composer : last
 * database


1 - clone the repository

2 - Update the config file .env

3 - Generate SSH keys for use [LexikJWTAuthenticationBundle](https://github.com/lexik/LexikJWTAuthenticationBundle/blob/master/Resources/doc/index.md#generate-the-ssh-keys).

4 - `cd {folder} && composer install`

5 - `bin/console d:d:c`

6 - `bin/console d:s:u --force`

if u want use fixture, change env to dev in the config file (env:dev)

7 - `bin/console d:f:l -n`

if u want use ssl security u must use `symfony server:ca:install` before

8 - `symfony server:start`
