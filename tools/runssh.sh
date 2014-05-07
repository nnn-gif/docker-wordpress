
#source  ports.sh
#PORT80=49167
#PORT22=8000
#MOUNT_DIRECTORY=/home/azureuser/mount
echo "delete all running Docker Process"

docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)


echo "Map Port 80 to :".${PORT80}
 read PORT80;

echo "Map port 22 to :".${PORT22}
 read PORT22;

echo "Directory to mount"
read MOUNT_DIRECTORY
#PORT80=49167
#PORT22=8000
#MOUNT_DIRECTORY=/home/azureuser/mount


docker build -t="docker/wordpress" . &
wait
#/home/azureuser/ponticlaro/docker-wordpress-nginx/mount
docker run -v ${MOUNT_DIRECTORY}:/usr/share/nginx/www -p ${PORT80}:80 -p ${PORT22}:22 -i -t -d    docker/wordpress 

echo  "Docker running ssh to docker using ssh root@localhost -p".${PORT22}
echo  "user: root, password: docker"
