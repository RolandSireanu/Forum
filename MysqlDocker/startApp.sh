Before running the containers : 
	Create volume : websitevolume
	Create network : internalnetwork 


sudo docker run -p 3306:3306 --name mysql_server -e MYSQL_ROOT_PASSWORD=root --net=internalnetwork -d sqlcontainer --default-authentication-plugin=mysql_native_password
sudo docker run --name phpadmin -d -e PMA_HOST=mysql_server -e PMA_PORT=3306 --net=internalnetwork -p 8081:80 phpmyadmin/phpmyadmin
sudo docker run -d -it -p 8080:80 --name mywebsite --net=internalnetwork --mount source=websitevolume,destination=/var/www/site mysite2
