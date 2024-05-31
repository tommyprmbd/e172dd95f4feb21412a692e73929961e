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

# API
- 