# 466-group-project
===============================================================
### ADD YOUR OWN LINK IF YOU USE public_html SO YOU CAN TEST YOUR PAGES EASIER
[Tommy](http://students.cs.niu.edu/~z1905494/) - [http://students.cs.niu.edu/~z1905494/466-group-project/test_web_pages.html](http://students.cs.niu.edu/~z1905494/466-group-project/test_web_pages.html)

[Quin](http://students.cs.niu.edu/~z1943410/) - [http://students.cs.niu.edu/~z1943410/466-group-project/test_web_pages.html](http://students.cs.niu.edu/~z1943410/466-group-project/test_web_pages.html)

[Rochelle](http://students.cs.niu.edu/~z1925687/) - [http://students.cs.niu.edu/~z1925687/466-group-project/test_web_pages.html](http://students.cs.niu.edu/~z1925687/466-group-project/test_web_pages.html)

[Princess](http://students.cs.niu.edu/~z1817575/) - [http://students.cs.niu.edu/~z1817575/466-group-project/test_web_pages.html](http://students.cs.niu.edu/~z1817575/466-group-project/test_web_pages.html)

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
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
Employee(__empID__, isOwner)

__Bold__:primary key  --  †:foriegn key


## TO DO

RS: user account - has order  **COMPLETE NEEDS HOOKING TO PROD**

RS: shoppping cart - enter order  **COMPLETED**

TR: inventory   **COMPLETED** 

PJ: product - search bar  **COMPLETED**

PJ: individual product pages - description, stock, add to shopping cart 

RS: checkout **COMPLETED**

QL: ordered costumer side - infomation **COMPLETED NEEDS CONNECTING**

QL: order fulfillment employees - order **COMPLETED**

QL: order detail - employee side **COMPLETED**

TR: login for user - start page **COMPLETED NEEDS CONNECTING**

MA: owner page - add employee, orderfulfill, inventory **COMPLETED**

MA: add employee page **COMPLETED**

TR: login for employee - **COMPLETED**
```
```
