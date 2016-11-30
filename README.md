
Installation
============

    cd /var/www/
    sudo git clone https://github.com/IoTAqua/supla-cloud.git
    sudo chown -R www-data:www-data /var/www/supla-cloud
    cd /var/www/supla-cloud

    sudo -u www-data bash
    chmod 775 app/cache app/logs

    cat supla-db.sql | mysql -p
    mysql -p -u root
    * CREATE USER 'supla'@'localhost' IDENTIFIED BY '<mysql-supla-password>';
    * GRANT ALL PRIVILEGES ON supla.* To 'supla'@'localhost';
    * FLUSH PRIVILEGES;

    cp /var/www/supla-cloud/app/config/parameters.yml.dist /var/www/supla-cloud/app/config/parameters.yml
    vi /var/www/supla-cloud/app/config/parameters.yml.dist
    * set "database_password:" <mysql-supla-password>
    * set "mailer_from:" to <admin@domain>

    curl -sS https://getcomposer.org/installer | php
    php composer.phar install
    ./update_db.sh

    exit
    sudo chown -R root:www-data *

Setup Apache
============

Config must have:

    DocumentRoot /var/www/supla-cloud/web
    Directory /var/www/supla-cloud/web>
      AllowOverride All
      Order Allow,Deny
      Allow from All
    </Directory>
