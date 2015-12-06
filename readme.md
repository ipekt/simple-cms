# Simple CMS

This is a very simple application that uses CRUD functions to simulate a simple CMS.


# Local Server
To run server:
`php -S localhost:8000 -t .`


# MySQL
To start:
`mysql.server start`

To login:
`mysql -u root -p`

# Database Structure

| Field   | Type         | Null | Key | Default | Extra          |
----------|--------------|------|-----|---------|----------------|
| id      | int(11)      | NO   | PRI | NULL    | auto_increment |
| title   | varchar(150) | YES  |     | NULL    |                |
| article | mediumtext   | YES  |     | NULL    |                |
| date    | datetime     | YES  |     | NULL    |                |

