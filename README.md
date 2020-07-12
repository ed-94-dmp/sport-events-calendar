## Sport Events Calendar

### Getting started
- Install frontend dependencies with the commands below.
```
cd client

yarn install OR npm install
```

- Composer dependencies will be automatically installed.

- To start docker containers run the command below.
First time will download and build required images.
```
docker compose up
```

To start it detached use ```-d``` flag.
```
docker compose up -d
```
Initial startup will also populate database.
Accordingly, start of mysql container could be longer than indicated.

- To run the tests use the command below.
```
composer test
```

- Visit the example page [here](http://localhost:8080/#/events/date/2020/10/10).

- phpMyAdmin can be accessed [at port 9000](http://localhost:9000).