INSERT INTO USERS
    (EMAIL, PASSWORD, USERNAME, BADDRESS, BCITY, BSTATE, BZIP, CARDNUM)
    VALUES ('emailA@email.com', 'password', 'Person 1', 'Address A', 'City A', 'ST', '123456', '123456789ABCDEFG');
INSERT INTO USERS
    (EMAIL, PASSWORD, USERNAME, BADDRESS, BCITY, BSTATE, BZIP, CARDNUM)
    VALUES ('emailB@email.com', 'password', 'Person 2', 'Address B', 'City A', 'ST', '123456', '0123456789ABCDEF');

INSERT INTO PRODUCTS
    (PRODNAME, PRICE, CATAGORY, DESCRIPTION, QUANTITY, STATUS)
    VALUES ('Product A', 1.00, 'A', 'Address B', 10, 1);

INSERT INTO ORDERS
    (USERID, SADDRESS, SCITY, SSTATE, SZIP, TOTAL, ORDERSTATUS, TRACKINGID)
    VALUES (1, 'Address A', 'City A', 'ST', '123456', 10.00, 'PENDING PAYMENT', 1);
INSERT INTO ORDERS
    (USERID, SADDRESS, SCITY, SSTATE, SZIP, TOTAL, ORDERSTATUS, TRACKINGID)
    VALUES (1, 'Address A', 'City A', 'ST', '123456', 20.00, 'PENDING PAYMENT', 2);
INSERT INTO ORDERS
    (USERID, SADDRESS, SCITY, SSTATE, SZIP, TOTAL, ORDERSTATUS, TRACKINGID)
    VALUES (2, 'Address A', 'City A', 'ST', '123456', 5.00, 'SHIPPED', 3);

INSERT INTO CART
    (USERID, PRODID, QUANTITY)
    VALUES (1, 1, 5);

INSERT INTO ORDERED
    (ORDERID, PRODID, QUANTITY)
    VALUES (1, 1, 2);

INSERT INTO EMPLOYEES
    (ENAME, ISOWNER)
    VALUES ('EMPLOYEE A', 1);

INSERT INTO FULFILLMENT
    (ORDERID, EMPID, COMMENTS)
    VALUES (1,1, 'BAD');