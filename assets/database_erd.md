erDiagram
    category {
        int categoryId PK
        varchar(50) categoryName
    }
    employees {
        int employeeID PK
        varchar(20) lastName
        varchar(10) firstName
        varchar(30) title
        varchar(25) titleOfCourtesy
        datetime birthDate
        datetime hireDate
        varchar(60) address
        varchar(15) city
        varchar(15) region
        varchar(10) postalCode
        varchar(15) country
        varchar(24) homePhone
        varchar(4) extension
        mediumtext notes
        int reportsTo FK
        varchar(255) photoPath
        float salary
    }
    item {
        int itemId PK
        varchar(150) itemName
        varchar(250) photo
        decimal price
        decimal salePrice
        varchar(2000) description
        tinyint(1) featured
        int categoryId FK
    }
    orderitem {
        int itemId
        int shoppingOrderId
        int quantity
        decimal price
    }
    shoppingorder {
        int shoppingOrderId PK
        datetime orderDate
        varchar(50) firstName
        varchar(50) lastName
        varchar(200) address
        varchar(20) contactNumber
        varchar(255) email
        varchar(20) creditCardNumber
        varchar(10) expiryDate
        varchar(50) nameOnCard
        varchar(3) csv
    }
    user {
        int userId PK
        varchar(50) userName
        varchar(255) password
    }

    employees ||--|o employees : reportsTo
    item ||--o{ category : categoryId
    orderitem }o--|| item : itemId
    orderitem }o--|| shoppingorder : shoppingOrderId

   
    Based on the database schema, the relationships should be:
    
employees ||--|o employees : reportsTo (An employee reports to zero or one employee)
item ||--o{ category : categoryId (An item belongs to one category, and a category can have zero or many items)
orderitem }o--|| item : itemId (An order item relates to one item, and an item can be in zero or many order items)
orderitem }o--|| shoppingorder : shoppingOrderId (An order item relates to one shopping order, and a shopping order can have zero or many order items)