## Description

This is a E-Book store project to pass the course "Programowanie aplikacji internetowych" at WSB in 2021

## Authors

- `Krzysztof Taciak`, `112301`
- `Mikołaj Targosz`, `112302`
- `Mateusz Terlecki`, `112308` 

## Installation

1. Requirements
``` 
- installed docker app (https://docs.docker.com/get-docker/)
- installed docker-compose (https://docs.docker.com/compose/install/)
```

2. Run `docker-compose up -d`

3. The 3 containers are deployed: 

```
Creating symfony-docker_db_1    ... done
Creating symfony-docker_php_1   ... done
Creating symfony-docker_nginx_1 ... done
```

4. Go to `localhost` page.


##Production environment 
1. Go to `http://matiskov.pl` to frontend

2. Go to `http://matiskov.pl/admin` to backend

    login: `admin`
    
    password: `admin123`
