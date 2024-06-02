# Installation
- copy .env.example to .env using command below
    ```shell
    cp -rv .env.example .env
    ```
    then adjust the value if needed.
- copy .env.example in /src folder to /src/.env using command below
    ```shell
    cp -rv src/.env.example src/.env
    ```
    then adjust the value if needed.
- start the services using command below
    ```shell
    docker compose up -d
    ```
- then start the migration database using command below
    ```shell
    docker exec -it levart_php php /apps/api/vendor/bin/phinx migrate -c /apps/api/phinx.php
    ```
- change permission for scheduler file, using command below
    ```shell
    docker exec -it levart_php chmod +x /apps/api/cron/scheduler.sh
    ```
- run the scheduler job using command below
    ```shell
    docker exec -it levart_php crond
    ```
# API
- 

# Additional Info
- If you want to stop the scheduler, you need to stop cron job and kill the scheduler job. To stop both jobs, first you need to get PID of the jobs. To do this, execute command below:
    ```shell
    docker exec -it levart_php ps aux | grep -E 'crond|scheduler.sh'
    ```
    it will shows something like this
    ```shell
    319 root      0:00 crond
    326 root      0:00 {scheduler.sh} /bin/bash /apps/api/cron/scheduler.sh
    ```
    kill the process using command below
    ```shell
    docker exec -it levart_php kill 319 326
    ```