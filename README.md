docker-templates
================

### Installing Docker

---

```
brew install boot2docker
brew install docker

```





### To install wordpress to docker

---


```
git clone  https://github.com/ponticlaro/docker-templates
cd docker-templates

```



Then you have to bring boot2docker up so 

```
boot2docker up
```

You have to make sure that port is open on the Virtualbox version of this if it is going to work. Also make sure you are on good wifi or it can have problems.


```
docker build -t="docker/wordpress" .
```

---

### Run the build docker


```
 

docker run -v /home/azureuser/ponticlaro/docker-wordpress-nginx/mount:/usr/share/nginx/www -p 33133:80 -i -t  docker/wordpress /bin/bash
```

---

-v /home/azureuser/ponticlaro/docker-wordpress-nginx/mount [local directory]:[container directory]

local directory is mounted to /usr/share/nginx/www folder , you can run composer, npm in your local directory
-p 33133:80, [host-port]:[container:port]


So NGINX is on Port 80 in the container, and that is going to port 33133 on the Mac host


---





You can the visit the following URL in a browser on your host machine to get started:

127.0.0.1:49167

127.0.0.1:[host-port]




### Deleting Docker Images

This removes everything...

```
docker rmi $(docker images | grep "^<none>" | awk "{print $3}")
```

But more likely you will just have to remove the virtualbox image that is running boot2docker.


### Quitting Docker

Control-C should get you out of Docker.  It will let you quit.

