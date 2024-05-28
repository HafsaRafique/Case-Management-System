# Legal-Case-Management-System
A Legal Case Management System is an essential tool for law firms and legal departments which 
helps them organize and handle their cases more efficiently. This system simplifies tasks like 
tracking case details, managing client information and storing other important information 
securely. By using such a system, legal professionals can make their tasks easier, stay organized, 
and provide better service to their clients.
## REQUIREMENTS:
### BACKEND:
For this project we have opted for PhpMyAdmin which is a free and open-source administrative 
tool for MySQL and MariaDB. The programming language we have used to access this tool is PHP 
and JavaScript.
### FRONTEND:
The frontend design languages we have used are HTML, CSS, SCSS. Some frontend designs have 
been imported as templates from[Colorlib]( https://colorlib.com/).
### ER DIAGRAM:
The ER diagram of our database comprises of eight tables. A CLIENT, CASE and LAWYER are 
linked via an associated entity meaning all will be foreign keys in the ASSIGNMENT table. A 
number of cases can be registered in a single COURT. A LAWYER is in CONTACT with a 
COURT, the court can update case status for a case.
<img src="erd.png">
