# ToDo & Co
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/190dd43033344fc6a3492d40a7ff4825)](https://www.codacy.com/gh/Paulcottin1/ToDoList/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Paulcottin1/ToDoList&amp;utm_campaign=Badge_Grade)
## Prerequisites (Development environement)
    - Linux
    - Php 7.3
    - MySQL 5.7
    - Apache2
## Installation

Clone the repository Github

```
git clone https://github.com/Paulcottin1/ToDoList.git
```

Create file `.env.local` at the root of the project by making a copy of the file `.env` in order to configure the environment variables.

Install dependencies

```
composer install
```

Create the database

```
php bin/console doctrine:database:create
```

Create the different tables with the migration

```
php bin/console doctrine:migrations:migrate
```

Install fixtures

```
php bin/console doctrine:fixtures:load
```

Run the project

```
symfony server:start
```

Use admin account to login

> username: admin
>
> password: admin
