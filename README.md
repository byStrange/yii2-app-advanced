<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template with Docker Support</h1>
    <br>
</p>

This is a modified version of the Yii 2 Advanced Project Template that includes a Docker setup for both development and production environments. This guide will walk you through setting up and running the project using Docker.

## For Those New to Docker

If you're not familiar with Docker, here's a quick overview:

*   **Docker:** A platform that allows you to run applications in isolated environments called "containers." This ensures that the application runs the same way regardless of the machine it's running on.
*   **`docker-compose`:** A tool for defining and running multi-container Docker applications. We use a `docker-compose.yml` file to configure our application's services (web server, database, etc.).
*   **Image:** A blueprint for creating a container.
*   **Container:** A running instance of an image.

## Prerequisites

*   [Docker](https://docs.docker.com/get-docker/)
*   [Docker Compose](https://docs.docker.com/compose/install/)

## Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
```

### 2. Initialize the Environment

This project uses an `init` script to configure the environment for either development or production.

```bash
php init
```

You will be prompted to choose an environment:

```
Which environment do you want the application to be initialized in?

  [0] Development
  [1] Production

  Your choice [0-1, or "q" to quit]
```

*   **Development:** For local development.
*   **Production:** For deployment to a live server.

After selecting an environment, the script will copy the necessary configuration files.

### 3. Create a `.env` File

The `docker-compose.yml` file uses environment variables from a `.env` file. You'll need to create this file in the root of the project.

```bash
cp .env.example .env
```

Now, open the `.env` file and customize the variables as needed.

## Development Mode

### 1. Run the Application

To start the application in development mode, run the following command:

```bash
docker compose up --build
```

This will build the Docker images and start the containers for the frontend, backend, and database services.

### 2. Accessing the Application

*   **Frontend:** `http://localhost:<FRONTEND_PORT>`
*   **Backend:** `http://localhost:<BACKEND_PORT>`
*   **Adminer (Database Management):** `http://localhost:8080`

The `FRONTEND_PORT` and `BACKEND_PORT` are defined in your `.env` file.

## Production Mode

### 1. Run the Application

To start the application in production mode, run the following command:

```bash
docker up -d --build
```

The `-d` flag runs the containers in detached mode (in the background).

### 2. Accessing the Application

*   **Application:** `http://localhost:<NGINX_PORT>`
*   **Adminer (Database Management):** `http://localhost:<ADMINER_PORT>`

The `NGINX_PORT` and `ADMINER_PORT` are defined in your `.env` file.
It is recommended to use custom host names to access your app. For example by default its `admin.myapp.local` for backend and `myapp.local` for frontend. To be able to use these names you should first need to update your `/etc/hosts` file (on windows its `C:\Windows\System32\drivers\etc`). Add or update this line on your hosts file:

```txt
127.0.0.1 admin.myapp.local myapp.local
```
With this setup you can now access your app with `http://{hostname}:{NGINX_PORT}` setup. For example `http://admin.myapp.local:8081`

## Additional Information

*   **Database:** The project is configured to use a PostgreSQL database. The database data is stored in a Docker volume named `pg_data`.
*   **Yii Commands:** To run Yii console commands, you can execute them inside the `php` container:

    ```bash
    docker compose exec php yii <command>
    ```

    For example, to run migrations:

    ```bash
    docker compose exec php yii migrate
    ```

    If you want to open bash:
    ```bash
    docker compose exec -it php bash
    ```

After all of that you might want to unplug this repo (because you're just using it as a template, you don't want to push or make changes to this codebase). To do that, you should run
```bash
git remote remove origin
```

And add your own origin (https://github.com/<username>/<repo> or git@github.com:<username>/<repo>)
```bash
git remote add origin <origin>
```

If you encounter any issues or have better recommendations feel free to open issue. I'm open to contributions
