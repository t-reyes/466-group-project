# 466-group-project
#### ER Diagram: 
![alt text](https://i.imgur.com/McAZbO7.png "Logo Title Text 1")

## Schema:

User(__userID__, email, password, name, billingAddress)

ShoppingCart(__userID†__, __prodID†__, quantity)

Product(__prodID__, name, price, description, category, quantity, stockStatus)

Ordered(__orderID†, prodID__†, quantity)

Orders(__orderID__, userID†, shippingAddress, cost, orderStatus, trackingID)

Fufillment(__orderID†__, __empID†__, fufillmentStatus)

Employee(__empID__, isOwner)

__Bold__:primary key  --  †:foriegn key


## TO DO

RS: user account - has order

RS: shoppping cart - enter order

MA: inventory 

PJ: product - search bar

PJ: individual product pages - description, stock, add to shopping cart 

RS: checkout

QL: ordered costumer side - infomation

QL: order fulfillment employees - order

QL: order detail - employee side

TR: login for user - start page 

MA: owner page - add employee, orderfulfill, inventory

MA: add employee page 

TR: login for employee - 

## PHP LOGIN CODE
```php
    $dsn = "mysql:host=courses;dbname=z1905494";
    $pdo = new PDO($dsn, 'z1905494', '2000Apr04');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```
