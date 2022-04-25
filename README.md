# 466-group-project
#### ER Diagram: 
![alt text](https://imgur.com/a/uaAgKHv "Logo Title Text 1")

#### Schema:

User(__userID__, email, password, name, billingAddress)

ShoppingCart(__userID†__, __prodID†__, quantity)

Product(__prodID__, name, price, description, quantity, stockStatus)

Ordered(__orderID†, prodID__†, quantity)

Orders(__orderID__, userID†, shippingAddress, cost, orderStatus, trackingID)

Fufillment(__orderID†__, __empID†__, fufillmentStatus)

Employee(__empID__, isOwner)

__Bold__  primary key
† foriegn key

