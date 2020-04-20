sudo docker run -p 3306:3306 --name mysql_server --hostname=mysqlhost -e MYSQL_ROOT_PASSWORD=root -d sqlcontainer --default-authentication-plugin=mysql_native_password
sudo docker run --name phpadmin -d -e PMA_HOST=mysqlhost -e PMA_PORT=3306 --link mysql_server -p 8081:80 phpmyadmin/phpmyadmin
