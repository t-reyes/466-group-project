# 466-group-project
ER Diagram: https://imgur.com/a/eOIM6gE

Schema:
User(userID, email, password, name, billingAddress)
ShoppingCart(userID†, prodID†, quantity)
Product(prodID, name, price, description, quantity, stockStatus)
Ordered(orderID†, prodID†, quantity)
Orders(orderID, userID†, shippingAddress, cost, orderStatus, trackingID)
Fufillment(orderID†, empID†, fufillmentStatus)
Employee(empID, isOwner)

wip
