<img src="http://static.andrewcassell.com/github/sqlicious/SQLicious.png" alt="SQLicious Logo" style="width:400px">

<http://www.sqlicious.com>

SQLicious
=============

SQLicious is a PHP Database ORM and abstraction layer for MySQL that handles generating
an object model from your database schema. It's powerful closure based query processing and 
ability to handle large datasets make it powerful and flexible. Its included web interface and ease of 
development make it a joy to use.

The ten features that make SQLicious easy and powerful are:

1. Closure based query processing that lets you handle data efficently and fully customizable manner
1. Web UI for code generation and fast paced development. It helps with common programming tasks (object creation, class stubs, queries).
1. Queries can easily be limited to a subset of fields in a table ("select first_name, last_name from table" vs. "select * from table"). You can still use objects when using a subset of the fields.
1. UPDATEs are minimal and only changed columns are updated
1. Buffered queries for performance and Unbuffered queries for processing huge datasets while staying memory safe
1. Factories and Objects are Automatically Generated
1. You can extend the Factories and Objects to encapsulate the logic of a model
1. Process any SQL query (multiple tables and joins) using the same closure based process model
1. Handles the CRUD
1. Convert Timezones Using MySQL Timezone Tables

Checkout the project on GitHub - <https://github.com/cassell/SQLicious>