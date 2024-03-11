# ERP example scripts
## Example PHP script for executing a SOAP request to read orderarticles.

### Requirements
- OXID eShop 6.2 PE or EE
- ERP Interface 3.1
  
The script was developed with the versions OXID eShop 6.2.2 and ERP Interface 3.1. It might work with older versions, too.

### Install
#### Get the script
Copy the script to a directory to which your webserver is pointing to and call it with the browser: `https://example.com/orderarticles.php`  
  
#### configure
Change the constants on top of the script accordingly.  

The constant OXID is a primary key from an entry of the table oxorder.
To get one, you can execute the following query or just use the displayed oxid, in case you have the demodata installed:
```mysql
MySQL [oxid]> select oxid from oxorder limit 1;
+----------------------------------+
| oxid                             |
+----------------------------------+
| 7d090db46a124f48cb7e6836ceef3f66 |
+----------------------------------+
1 row in set (0.001 sec)

MySQL [oxid]> 
```

## Example PHP script for getting an article

### Requirements
- OXID eShop 7 PE or EE
- ERP Interface 4.0

The script was developed with the versions OXID eShop 7.0.1 and ERP Interface 4. It might work with older versions, too.

#### configure
Change the constants on top of the script accordingly.  

The constant OXID is a primary key from an entry of the table oxarticles.
To get one, you can execute the following query or just use the displayed oxid, in case you have the demodata installed:

```mysql
MySQL [oxid]> select oxid from oxarticles limit 1;
+----------------------------------+
| oxid                             |
+----------------------------------+
| 066e3ce119c43c81cc0e46d4f1681eed |
+----------------------------------+
1 row in set (0.001 sec)

MySQL [oxid]> 
```

## Example PHP script for creating an article

### Requirements
- OXID eShop 7 PE or EE
- ERP Interface 4.0

The script was developed with the versions OXID eShop 7.0.1 and ERP Interface 4. It might work with older versions, too.
