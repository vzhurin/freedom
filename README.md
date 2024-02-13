# Requirements
* \>= PHP 8.1
* ext-xml
* ext-sqlite3
* symfony installer (https://symfony.com/download)

# Endpoints
## /stores/with_user
Displays all **stores** with **users**

## /products/with_store_and_user
Displays all **products** with **stores** and **users**

## /with_user
Displays all **products** with **users**

# How to launch the application
* git clone git@github.com:vzhurin/freedom.git
* cd freedom
* composer install
* bin/console d:s:u -f
* bin/console d:f:l -n
* symfony server:start
* Try querying endpoints
