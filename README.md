<h1>Introduction to PHP with MVC</h1>

Development of a template PHP project using the MVC (*Model-View-Controller*) architecture. This project also shows the basic usage of SQL in MySQL.

---

<h2>Index</h2>

- [Dependencies](#dependencies)
- [Installation](#installation)
- [Project Structure](#project-structure)
- [Apache 2 Virtual Hosts](#apache-2-virtual-hosts)
    - [Move the project to /var/www/](#move-the-project-to-varwww)
    - [Permissions in /var/www/](#permissions-in-varwww)
    - [Create the virtual host files](#create-the-virtual-host-files)
    - [Activate the new Virtual Host files](#activate-the-new-virtual-host-files)
    - [Configure the Host file from local server](#configure-the-host-file-from-local-server)
    - [htaccess](#htaccess)
- [Composer](#composer)
  - [Installation](#installation-1)
  - [Composer init](#composer-init)
  - [Composer require](#composer-require)
  - [Composer update](#composer-update)
  - [Removing a package](#removing-a-package)
  - [Composer install](#composer-install)
  - [Composer dump-autoload](#composer-dump-autoload)
  - [Packagist](#packagist)
- [MySQL](#mysql)
  - [Installation](#installation-2)
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

```
.
├── App
│   ├── Controllers
│   ├── Core
│   ├── Models
│   └── Views
├── composer.json
├── LICENSE
├── public
│   ├── assets
│   ├── css
│   ├── index.php
│   └── js
├── README.md
└── vendor
    ├── autoload.php
    └── composer
```

---

## Apache 2 Virtual Hosts

How to access yourlocaldomainname.com using apache:

#### Move the project to /var/www/

Create / move your project folder, for example `phpmvc.com/`, into `/var/www/`:

```shell
$ sudo mkdir /var/www/phpmvc.com/public
```

And insert your `index.php` file into it.

#### Permissions in /var/www/

Add the apache user to the group of the logged in user:

```shell
$ sudo usermod -a -G www-data $USER
```

Change the group-level owner of the /var/www folder and its contents to the Apache group:

```shell
$ sudo chown -R $USER:www-data /var/www
```

Now we need to modify the permissions to ensure that the user has unrestricted access (write and read) to the files and that at the group level can read and execute the files. This way you ensure that other users can see your files (access the site) and your user has write access:

```shell
$ sudo chmod -R 775 /var/www
```

#### Create the virtual host files

The files that define the Virtual Host are responsible for defining the configuration of each domain. Apache comes with a default file and we are going to copy it to use it as a starting point. Go to `/etc/apache2/sites-available/` and duplicate the vhost file, adapting it for your project:

```shell
$ cd /etc/apache2/sites-available/
$ sudo cp 000-default.conf phpmvc.com.conf
```

Now edit the new file, by leaving this content in it:

```apache
<VirtualHost *:80>
	ServerName phpmvc.com
	ServerAlias www.phpmvc.com
	ServerAdmin admin@phpmvc.com
	DocumentRoot /var/www/phpmvc.com/public

	<Directory "/var/www/phpmvc.com/">
		Options Indexes FollowSymLinks MultiViews
		AllowOverride All
		Require all granted
	</Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

#### Activate the new Virtual Host files

Activate it on Apache and reload the server by doing:

```shell
$ sudo a2ensite phpmvc.com.conf
$ sudo systemctl reload apache2
```

#### Configure the Host file from local server

It is necessary to “warn” the local server that the files related to these domains are configured locally, so that they are not searched on the internet. For that, edit the `/etc/hosts` file, and duplicate the second line, but typing our site domain name, leaving the file like this:

```
127.0.0.1       localhost
127.0.1.1       data-hunter-gl
127.0.1.1       phpmvc.com
```

And, finally, you should be able to navigate into www.phpmvc.com in your browser.

#### htaccess

In order to apache 2 redirect the inner routes correctly to `public/index.php`, you'll have to create a `.htaccess` file on the `public/` directory. Its content must be:

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php
```

Then, enable the rewrite apache module:

```shell
$ sudo a2enmod rewrite
$ sudo systemctl restart apache2
```

---

## Composer

### Installation

<small>*From the Composer Docs:</small>

Composer is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you.

Composer is not a package manager in the same sense as Yum or Apt are. Yes, it deals with "packages" or libraries, but it manages them on a per-project basis, installing them in a directory (e.g. vendor) inside your project. By default, it does not install anything globally. Thus, it is a dependency manager. It does however support a "global" project for convenience via the global command.

To install globally, navigate into `bin` directory, give execution permission to the composer installation scripts, then execute it.

```shell
$ cd bin
$ chmod +x composer_install.sh
$ ./composer_install.sh
```

Finally, for enabling the call for `composer` command from anywhere, move the `composer.phar` to a system/user bin directory:

```shell
$ mv composer.phar ~/.local/bin/composer
```

### Composer init

The `composer init` command creates the *composer.json*. This file describes the dependencies of your project and may contain other metadata as well. It typically should go in the top-most directory of your project/VCS repository. You can technically run Composer anywhere but if you want to publish a package to [Packagist](#packagist), it will have to be able to find the file at the top of your VCS repository. Usage:

```shell
$ composer init
```

### Composer require

In order to install a package, *monolog* as an example, type:

```shell
$ composer require monolog/monolog
```

### Composer update

To initially install the defined dependencies for your project, you should run the `update` command.

This will make Composer do two things:

- It resolves all dependencies listed in your `composer.json` file and writes all of the packages and their exact versions to the composer.lock file, locking the project to those specific versions. You should commit the `composer.lock` file to your project repo so that all people working on the project are locked to the same versions of dependencies (more below). This is the main role of the `update` command.

- It then implicitly runs the `install` command. This will download the dependencies' files into the `vendor` directory in your project. (The `vendor` directory is the conventional location for all third-party code in a project). In our example from above, you would end up with the Monolog source files in `vendor/monolog/monolog/`. As Monolog has a dependency on `psr/log`, that package's files can also be found inside `vendor/`.

If you only want to install, upgrade or remove one dependency, you can explicitly list it as an argument:

```shell
$ composer update monolog/monolog
```

### Removing a package

Remove the line containing the `<vendor>/<package-name>` from the `composer.json`, then type:

```shell
$ composer update
```

### Composer install

If there is already a composer.lock file in the project folder, it means either you ran the update command before, or someone else on the project ran the update command and committed the composer.lock file to the project (which is good).

Either way, running install when a composer.lock file is present resolves and installs all dependencies that you listed in composer.json, but Composer uses the exact versions listed in composer.lock to ensure that the package versions are consistent for everyone working on your project. As a result you will have all dependencies requested by your composer.json file, but they may not all be at the very latest available versions (some of the dependencies listed in the composer.lock file may have released newer versions since the file was created). This is by design, it ensures that your project does not break because of unexpected changes in dependencies.

So after fetching new changes from your VCS repository it is recommended to run a Composer install to make sure the vendor directory is up in sync with your composer.lock file.

```shell
$ composer install
```

### Composer dump-autoload

Autoloading is the process of automatically loading PHP classes without explicitly loading them with the `require()`, `require_once()`, `include()`, or `include_once()` functions.

For libraries that specify autoload information, Composer generates a vendor/autoload.php file. You can include this file and start using the classes that those libraries provide without any extra work:

```php
require __DIR__ . '/vendor/autoload.php';

// Use the libraries here without requiring'em.
```

Composer autoloads your project's classes the same way it autoloads external libraries. For that, there is a property called autoload that can be added in composer.json:

```json
{
  "autoload": {
    "psr-4": {
      "MyNamespace\\": "src/"
    }
  }
}
```

Composer will register a PSR-4 autoloader for the `MyNamespace` namespace.

You define a mapping from namespaces to directories. The `src` directory would be in your project root, on the same level as `vendor` directory is. An example filename would be `src/Foo.php` containing a `MyNamespace\Foo` class.

Composer maintains its own cache regarding the autoload files, so we need to use the following command every time we make a change to the autoload, as it will update the cache:

```shell
$ composer dump-autoload
```

This command will re-generate the `vendor/autoload.php` file. See the [dump-autoload](https://getcomposer.org/doc/03-cli.md#dump-autoload-dumpautoload-) docs for more information.

Including that file will also return the autoloader instance, so you can store the return value of the include call in a variable and add more namespaces. This can be useful for autoloading classes in a test suite, for example:

```php
$loader = require __DIR__ . '/vendor/autoload.php';
$loader->addPsr4('Acme\\Test\\', __DIR__);
```

In addition to PSR-4 autoloading, Composer also supports PSR-0, classmap and files autoloading. See the [autoload docs](https://getcomposer.org/doc/04-schema.md#autoload) for more information.

### Packagist

Packagist.org is the main Composer repository. A Composer repository is basically a package source: a place where you can get packages from. Packagist aims to be the central repository that everybody uses. This means that you can automatically require any package that is available there, without further specifying where Composer should look for the package.

If you go to the Packagist.org website, you can browse and search for packages.

Any open source project using Composer is recommended to publish their packages on Packagist. A library does not need to be on Packagist to be used by Composer, but it enables discovery and adoption by other developers more quickly.

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
GRANT ALL PRIVILEGES ON databasename.* TO 'yourusername'@'localhost';
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
