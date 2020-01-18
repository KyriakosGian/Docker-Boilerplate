# Simple Boilerplate Web Development Environment with Docker

## Before you start

1. You must have Docker installed on your pc before you start.
   https://www.docker.com/products/docker-desktop
1. Copy all files to your project folder.
    > Download ZIP from https://github.com/KyriakosG78/SimpleWDEwDocker
                                             
    > OR run git clone in console
    >>`git clone https://github.com/KyriakosG78/SimpleWDEwDocker.git`                                                                                                                                                            

1. Change settings in {.env} file with your preferences.
1. Run Docker compose command for docker-compose.yml
   1. From command line go to project folder and run
      >docker-compose -f "docker-compose.yml" up -d --build
   1. OR With help of Docker extension if you are using Visual Studio Code.
        > https://code.visualstudio.com/
        
        >https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-docker
1. That's all folks !
    1. Open your brower on http://localhost/ for server
    1. Or open your brower on http://localhost:8000/ for phpMyAdmin.
---
## Components

### Web Server with PHP

- Apache with php 7.4 version
>https://hub.docker.com/_/php

>https://httpd.apache.org/

>https://www.php.net/

### DataBase

- mysql 8.0 version 
>https://www.mysql.com/

### Database Manager

- phpMyAdmin 
>https://www.phpmyadmin.net/

---
## Extras

- You can fix some settings in php.ini file before you start server.
- .env file have default username and passwords. You must change  it.