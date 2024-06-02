# Prerequisites
You need to install 
- Docker
- Docker Compose
- Composer

# Architecture
- 

# Installation
- Copy .env.example to .env using command below
    ```shell
    cp -rv .env.example .env
    ```
    then adjust the value if needed.
- Copy .env.example in /src folder to /src/.env using command below
    ```shell
    cp -rv src/.env.example src/.env
    ```
    then adjust the value if needed.
- Start the services using command below
    ```shell
    docker compose up -d
    ```
- Install dependencies. Go to <code>/src</code> folder, then execute command below
    ```shell
    composer install
    ```
- Migrate the database using command below
    ```shell
    docker exec -it levart_php php /apps/api/vendor/bin/phinx migrate -c /apps/api/phinx.php
    ```
# API Endpoints

### Users
<details>
  <summary><code>GET</code> <code><b>/api/users</b></code> <code>Listing all users</code></summary>

#### Parameters
> None

#### Responses
> | http code     | content-type                      | 
> |---------------|-----------------------------------|
> | `200`         | `application/json`        |   
    
    {
        "status": {
            "code": 200,
            "message": "Ok."
        },
        "data": [
            {
                "id": 15,
                "createdAt": "2024-06-01 17:21:50",
                "firstName": "Bambang",
                "lastName": "Yang Lain",
                "email": "bp@gmail.com"
            }
        ],
        "meta": {
            "timestamp": 1717262804
        }
    } 
</details>

<details>
  <summary><code>GET</code> <code><b>/api/users/{id}</b></code> <code>Get user by userId</code></summary>

#### Parameters
> | name              |  type     | data type      | description                         |
> |-------------------|-----------|----------------|-------------------------------------|
> | `id` |  required | int ($int64)   | user id        |

#### Responses
> | http code     | content-type                      | 
> |---------------|-----------------------------------|
> | `200`         | `application/json`        |   
    
    {
        "status": {
            "code": 200,
            "message": "Ok."
        },
        "data": {
            "id": 15,
            "createdAt": "2024-06-01 17:21:50",
            "firstName": "Bambang",
            "lastName": "Yang Lain",
            "email": "bp@gmail.com"
        },
        "meta": {
            "timestamp": 1717262852
        }
    } 
</details>

<details>
  <summary><code>POST</code> <code><b>/api/users</b></code> <code>Create new user</code></summary>

#### Parameters
> None

#### Payload
> | content-type                      | 
> |-----------------------------------|
> |`application/json`        |   


> | Key | Type | Required |
> |---|---|---|
> |<code>email</code>|string|Y|
> |<code>password</code>|string|Y|
> |<code>first_name</code>|string|Y|
> |<code>last_name</code>|string|N|

    {
        "email": "admin@gmail.com",
        "password": "P@ssw0rd2024",
        "first_name": "John",
        "last_name": "Doe"
    }

#### Responses
> | http code     | content-type                      | 
> |---------------|-----------------------------------|
> | `200`         | `application/json`        |   
    
    {
        "status": {
            "code": 201,
            "message": "Created."
        },
        "data": {
            "id": 16,
            "createdAt": "2024-06-01 17:29:28",
            "firstName": "John",
            "lastName": "Doe",
            "email": "admin@gmail.com"
        },
        "meta": {
            "timestamp": 1717262968
        }
    }
</details>

<details>
  <summary><code>PUT</code> <code><b>/api/users/{id}</b></code> <code>Edit user by id</code></summary>

#### Parameters
> | name              |  type     | data type      | description                         |
> |-------------------|-----------|----------------|-------------------------------------|
> | `id` |  required | int ($int64)   | user id        |

#### Payload
> | content-type                      | 
> |-----------------------------------|
> |`application/json`        |   

> | Key | Type | Required |
> |---|---|---|
> |<code>email</code>|string|Y|
> |<code>password</code>|string|N|
> |<code>first_name</code>|string|Y|
> |<code>last_name</code>|string|N|


    {
        "email": "admin@gmail.com",
        "password": "P@ssw0rd2024",
        "first_name": "John",
        "last_name": "Doe"
    }

#### Responses
> | http code     | content-type                      | 
> |---------------|-----------------------------------|
> | `200`         | `application/json`        |   
    
    {
        "status": {
            "code": 201,
            "message": "Created."
        },
        "data": {
            "id": 16,
            "createdAt": "2024-06-01 17:29:28",
            "firstName": "John",
            "lastName": "Doe",
            "email": "admin@gmail.com"
        },
        "meta": {
            "timestamp": 1717262968
        }
    }
</details>


<details>
  <summary><code>DELETE</code> <code><b>/api/users/{id}</b></code> <code>Delete user by userId</code></summary>

#### Parameters
> | name              |  type     | data type      | description                         |
> |-------------------|-----------|----------------|-------------------------------------|
> | `id` |  required | int ($int64)   | user id        |

#### Responses
> | http code     | content-type                      | 
> |---------------|-----------------------------------|
> | `200`         | `application/json`        |   
    
    {
        "status": {
            "code": 200,
            "message": "Ok."
        },
        "data": true,
        "meta": {
            "timestamp": 1717342010
        }
    }
</details>

### Mailing
<details>
  <summary><code>POST</code> <code><b>/api/send-email</b></code> <code>Add new email queue</code></summary>

#### Parameters
> None

#### Payload
> | content-type                      | 
> |-----------------------------------|
> |`application/json`        |   


> | Key | Type | Required |
> |---|---|---|
> |<code>email</code>|string|Y|
> |<code>subject</code>|string|Y|
> |<code>message</code>|string|Y|

    {
        "email": "john.doe@gmail.com",
        "subject": "Lorem ipsum",
        "message": "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
    }

#### Responses
> | http code     | content-type                      | 
> |---------------|-----------------------------------|
> | `200`         | `application/json`        |   
    
    {
    "status": {
        "code": 200,
        "message": "Ok."
    },
    "data": {
        "id": 1,
        "email": "john.doe@gmail.com",
        "subject": "Lorem ipsum",
        "message": "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
        "processedAt": null,
        "status": "WAITING",
        "additionalInfo": null,
        "updatedBy": null,
        "updatedAt": null,
        "createdBy": null,
        "createdAt": "2024-06-02 14:43:57"
    },
    "meta": {
        "timestamp": 1717339437
    }
}
</details>

<details>
  <summary><code>GET</code> <code><b>/api/scheduler/send-email</b></code> <code>Processing email queue</code></summary>

#### Parameters
> None

#### Responses
> | http code     | content-type                      | 
> |---------------|-----------------------------------|
> | `200`         | `application/json`        |   
    
    {
        "status": {
            "code": 200,
            "message": "Ok."
        },
        "data": {
            "total": 2,
            "success": 2,
            "failed": 0,
            "result": [
                {
                    "id": 17,
                    "recipient": "john.doe@gmail.com",
                    "result": "Success"
                },
                {
                    "id": 18,
                    "recipient": "john.doe.wife@gmail.com",
                    "result": "Success"
                }
            ]
        },
        "meta": {
            "timestamp": 1717333194
        }
    } 
</details>


# Additional Info
- The mail scheduler (cron job) running every minute.
- You can check scheduler log in <code>docker/php/logs</code>. Also, you can check another log in <code>src/cron/logs</code>