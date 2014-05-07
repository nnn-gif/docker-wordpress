
#source  ports.sh
#PORT80=49167
#PORT22=8000
#MOUNT_DIRECTORY=/home/azureuser/mount
echo "delete all running Docker Process"

docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)


echo "Map Port 80 to :".${PORT80}
 read PORT80;


echo "Directory to mount"
read MOUNT_DIRECTORY
#PORT80=49167
#PORT22=8000
#MOUNT_DIRECTORY=/home/azureuser/mount


docker build -t="niktrix/wordpress" . &
wait
docker run -v ${MOUNT_DIRECTORY}:/usr/share/nginx/www -p ${PORT80}:80  -i -t    niktrix/wordpress 

echo  "Docker running ssh to docker using ssh root@localhost -p".${PORT22}
echo  "user: root, password: docker"
