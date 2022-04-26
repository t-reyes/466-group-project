# 466-group-project
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

user account - has order

shoppping cart - enter order

inventory 

product - search bar

individual product pages - description, stock, add to shopping cart 

checkout

ordered costumer side - infomation

order fulfillment employees

login for user - start page 

login for employee 
```
