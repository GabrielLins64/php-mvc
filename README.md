<h1>Introduction to PHP with MVC</h1>

Development of a template PHP project using the MVC (*Model-View-Controller*) architecture.

---

<h2>Index</h2>

- [Dependencies](#dependencies)
- [Installation](#installation)
- [Project Structure](#project-structure)
- [MySQL](#mysql)
  - [Installation](#installation-1)
  - [Creating a new user](#creating-a-new-user)
  - [Basic usage](#basic-usage)
  - [Scripting](#scripting)
- [References](#references)

---

## Dependencies

- [PHP 7.4](https://www.php.net/releases/7_4_0.php)
- [MySQL 8.0.27](https://www.mysql.com/)

---

## Installation

---

## Project Structure

---

## MySQL

### Installation

Download and install MySQL Server

```shell
$ sudo apt update
$ sudo apt install mysql-server
```

Edit the php.ini configuration file:

```shell
$ sudo vim /etc/php/7.4/cli/php.ini
```

Then, uncomment the mysqli, openssl and pdo_mysql extensions, like this:

```ini
extension=mysqli
;extension=oci8_12c  ; Use with Oracle Database 12c Instant Client
;extension=odbc
extension=openssl
;extension=pdo_firebird
extension=pdo_mysql
```

### Creating a new user

Login to mysql default root user (no password)

```shell
$ sudo mysql -u root
```

Create the user:

```sql
CREATE USER 'yourusername'@'localhost' IDENTIFIED BY 'yourpassword';
```

Flush the privileges, in order to reload the user table in MySQL:

```sql
FLUSH PRIVILEGES;
```

Set permissions for the new user to a database:

```sql
GRANT ALL PRIVILEGES ON `databasename` . * TO 'yourusername'@'localhost';
```

Finally, you can login as the new user using:

```shell
$ mysql -u yourusername -p
```

### Basic usage

### Scripting

---

## References
