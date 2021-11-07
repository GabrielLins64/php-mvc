<h1>Introduction to PHP with MVC</h1>

Development of a template PHP project using the MVC (*Model-View-Controller*) architecture. This project also shows the basic usage of SQL in MySQL.
---

<h2>Index</h2>

- [Development of a template PHP project using the MVC (*Model-View-Controller*) architecture. This project also shows the basic usage of SQL in MySQL.](#development-of-a-template-php-project-using-the-mvc-model-view-controller-architecture-this-project-also-shows-the-basic-usage-of-sql-in-mysql)
- [Dependencies](#dependencies)
- [Installation](#installation)
- [Project Structure](#project-structure)
- [MySQL](#mysql)
  - [Installation](#installation-1)
  - [Creating a new user](#creating-a-new-user)
  - [Basic usage (queries)](#basic-usage-queries)
    - [List all databases](#list-all-databases)
    - [Use a database](#use-a-database)
    - [Showing the tables](#showing-the-tables)
    - [Visualizig tables column](#visualizig-tables-column)
    - [Querying data from columns](#querying-data-from-columns)
    - [Inserting data into a column](#inserting-data-into-a-column)
    - [Deleting data](#deleting-data)
    - [Create statement](#create-statement)
    - [Drop statement](#drop-statement)
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

### Basic usage (queries)

#### List all databases

```sql
SHOW DATABASES;
```

#### Use a database

If there is a database named "testdb", in order to apply the next queries on it, type:

```sql
USE testdb;
```

#### Showing the tables 

To visualize the tables on that database, just type:

```sql
SHOW TABLES;
```

#### Visualizig tables column

If you want to know what columns the table "mytable" has, use:

```sql
SHOW COLUMNS FROM mytable;
```

#### Querying data from columns

Lets say that the table "mytable" has the fields "id", "name" and "email". And you want to see all data inserted on that fields. Just select those fields:

```sql
SELECT id, name, email FROM mytable;
```

And if you want all columns from that table:

```sql
SELECT * FROM mytable;
```

#### Inserting data into a column

If the table has only the columns name and email being "NOT NULL", you could just insert these values on it:

```sql
INSERT INTO mytable (name, email) VALUES ('the name', 'name@email.com');
```

But if you are adding values for all the columns of the table, you do not need to specify the column names in the query:

```sql
INSERT INTO mytable VALUES (value1, value2, value3, ...);
```

#### Deleting data

If you want to remove a row from a column, just use the statement:

```sql
DELETE FROM mytable WHERE condition;
```

For instance, if you want to remove all rows where the name is 'John', query:

```sql
DELETE FROM mytable WHERE name='John';
```

#### Create statement

In order to create a **table** named "table_name":

```sql
CREATE TABLE table_name (
  column1 datatype,
  column2 datatype,
  column3 datatype,
  ...
);
```

For example, in order to create a table with auto increment id as primary key:

```sql
CREATE TABLE mytable (
  id INT NOT NULL AUTO_INCREMENT,
  name CHAR(30) NOT NULL,
  PRIMARY KEY (id)
);
```

You can check the MySQL data types [here](https://www.w3schools.com/sql/sql_datatypes.asp)

In order to create a **database** named "dbname":

```sql
CREATE DATABASE dbname;
```

Also, if you are making a script, in the query you can check if the database already exists, in which case mysql will just display a warning:

```sql
CREATE DATABASE IF NOT EXISTS dbname;
```

#### Drop statement

If you need to delete a **column**:

```sql
ALTER TABLE mytable DROP COLUMN column_name;
```

If you need to delete a **database**:

```sql
DROP DATABASE dbname;
```

### Scripting

---

## References
