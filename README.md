# 466-group-project
===============================================================
### ADD YOUR OWN LINK IF YOU USE public_html SO YOU CAN TEST YOUR PAGES EASIER
[Tommy](http://students.cs.niu.edu/~z1905494/) - [http://students.cs.niu.edu/~z1905494/466-group-project/test_web_pages.html](http://students.cs.niu.edu/~z1905494/466-group-project/test_web_pages.html)

[Quin](http://students.cs.niu.edu/~z1943410/) - [http://students.cs.niu.edu/~z1943410/466-group-project/test_web_pages.html](http://students.cs.niu.edu/~z1943410/466-group-project/test_web_pages.html)

[Rochelle](http://students.cs.niu.edu/~z1925687/) - [http://students.cs.niu.edu/~z1925687/466-group-project/test_web_pages.html](http://students.cs.niu.edu/~z1925687/466-group-project/test_web_pages.html)

===============================================================
#### ER Diagram: 
![alt text](https://i.imgur.com/zzbvd6Y.jpg "Logo Title Text 1")

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
```
```
