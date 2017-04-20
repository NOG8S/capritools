# install

1. start capritools - `docker-compose up -d`
2. wait a bit until everything is up and running, mysql may need some time to start
3. create database for capritools and apply db schema - `docker-compose exec mysql /tmp/capritools/install/tools.sh`
4. download latest eve mysql sdk dump from [fuzzwork](https://www.fuzzwork.co.uk/dump/latest) - `install/sde_download.sh` (requires [wget](https://linux.die.net/man/1/wget) and [pbzip2](https://linux.die.net/man/1/pbzip2))
5. apply sdk - `docker-compose exec mysql /tmp/capritools/install/sde_use.sh`

## upgrade sde

repeat points `4` and `5`