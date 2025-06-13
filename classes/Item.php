<?php

/**
 * Defines a Product
 * NOTE: THIS IS ONLY A PARTIAL IMPLEMENTATION - NO INSERT, UPDATE, DELETE, ETC
 */
class Item
{
  
  #region Properties (private)

  private int $_itemId;
  private string $_itemName;
  private float $_price;
  private float $_salePrice;
  private string $_description;
  private DBAccess $_db;
  private int $_categoryId;
  private string $_photo;

  #endregion

  #region Constructor - sets up the database connection (using DBAccess)

  public function __construct()
  {
    // Create database connection and store into _db property (so other methods can use DBAccess)
    $db = require INCLUDES_DIR . "database.php";
    $this->_db = $db;
  }

  #endregion
  
  #region Getter and setter methods

  /**
   * Get product ID (there is NO setter for product ID to make it read-only)
   *
   * @return int The product ID
   */
  public function getItemId()
  {
    return $this->_itemId;
  }

  /**
   * Get item name
   *
   * @return string The product name
   */
  public function getItemName()
  {
    return $this->_itemName;
  }

  /**
   * Set item name
   *
   * @param  string $itemName The new item name
   * @return void
   */
  public function setItemName($itemName)
  {
    // Remove spaces
    $value = trim($itemName);

    // Check string length (between 1 & 40)
    if (strlen($value) < 1 || strlen($value) > 40) {
      
      // Invalid new value - throw an exception
      throw new Exception("Product name must be between 1 and 40 characters.");

    } else {
      
      // Store new value in private property
      $this->_itemName = $value;

    }
  }

  /**
   * Get item price
   *
   * @return string The item price
   */
  public function getPrice()
  {
    return $this->_price;
  }

    
  /**
   * Set price
   *
   * @param  string $unitPrice The new price
   * @return void
   */
  public function setPrice($price)
  {
    $this->_price = $price;
  }

  /**
   * Get item sale price
   *
   * @return float The item sale price
   */
  public function getSalePrice(): float
  {
    return $this->_salePrice;
  }

  /**
   * Set sale price
   *
   * @param  float $salePrice The new sale price
   * @return void
   */
  public function setSalePrice(float $salePrice): void
  {
    $this->_salePrice = $salePrice;
  }

  /**
   * Get item description
   *
   * @return string The item description
   */
  public function getDescription(): string
  {
    // Return value of private property
    return $this->_description;
  }
    
  /**
   * Set description
   *
   * @param  string $description The new description
   * @return void
   */
  public function setDescription(string $description): void
  {
    // Store new value in the private property
    $this->_description = $description;
  }
  

  /**
   * Set category ID
   *
   * @param  int $categoryId The new category ID
   * @return void
   */
  public function setCategoryId(int $categoryId): void
  {
    $this->_categoryId = $categoryId;
  }

  /**
   * Get photo
   *
   * @return string The photo
   */
  public function getPhoto(): string
  {
    return $this->_photo;
  }

  /**
   * Set photo
   *
   * @param  string $photo The new photo
   * @return void
   */
  public function setPhoto(string $photo): void
  {
    $this->_photo = $photo;
  }

  #endregion

  #region Methods

  /**
   * Get a product by ID and populate the object's properties
   *
   * @param  int $id The ID of the product to get
   * @return void
   */
  public function getItem($id)
  {
    try {

      // Open database connection
      $this->_db->connect();

      // Define SQL query, prepare statement, bind parameters
      $sql = <<<SQL
        SELECT  itemID, itemName, price, salePrice, description
        FROM    item
        WHERE   itemID = :itemID
      SQL;
      $stmt = $this->_db->prepareStatement($sql);
      $stmt->bindParam(":itemID", $id, PDO::PARAM_INT);

      // Execute query
      $rows = $this->_db->executeSQL($stmt);

      // Get the first (and only) row - we are searching by a unique primary key
      $row = $rows[0];

      // Populate the private properties with the retrieved values
      $this->_itemId = $row["itemID"];
      $this->_itemName = $row["itemName"];
      $this->_price = $row["price"];
      $this->_salePrice = $row["salePrice"];
      $this->_description = $row["description"];

    } catch (PDOException $e) {
      
      // Throw the exception back up a level (don't handle it here)
      throw $e;
    }
  }

  /**
   * Get all items
   *
   * @return array The collection of items
   */
  public function getItems()
  {
    try {

      // Open database connection
      $this->_db->connect();

      // Define SQL query, prepare statement, bind parameters
      $sql = <<<SQL
        SELECT  itemID, itemName, price, description
        FROM    item
      SQL;
      $stmt = $this->_db->prepareStatement($sql);

      // Execute SQL
      $rows = $this->_db->executeSQL($stmt);
      return $rows;

    } catch (PDOException $e) {
      throw $e;
    }
  }

  /**
   * Get the total number of products (COUNT)
   *
   * @return int The number of items
   */
  public function getNumberOfItems()
  {
    try {

      // Open database connection
      $this->_db->connect();

      // Define SQL query, prepare statement, bind parameters
      $sql = <<<SQL
        SELECT  COUNT(*)
        FROM    item
      SQL;
      $stmt = $this->_db->prepareStatement($sql);

      // Execute SQL
      $value = $this->_db->executeSQLReturnOneValue($stmt);
      return $value;

    } catch (PDOException $e) {
      throw $e;
    }
  }
    
  /**
   * Add a item using values in object's properties
   *
   * @return integer The ID of the new item
   */
  public function insertItem(): int
  {
    try {

      // NODO: Add validation to make sure data is OK before inserting into database
      
      // Open the database connection
      $this->_db->connect();

      // Define query, prepare statement, bind parameters
      $sql = <<<SQL
        INSERT INTO item (itemName, photo, price, salePrice, description, categoryId)
        VALUES (:itemName, :photo, :price, :salePrice, :description, :categoryId)
      SQL;
      $stmt = $this->_db->prepareStatement($sql);
      $stmt->bindValue(":itemName", $this->_itemName, PDO::PARAM_STR);
      $stmt->bindValue(":photo", $this->_photo, PDO::PARAM_STR);
      $stmt->bindValue(":price", $this->_price, PDO::PARAM_STR);
      $stmt->bindValue(":salePrice", $this->_salePrice, PDO::PARAM_STR);
      $stmt->bindValue(":description", $this->_description, PDO::PARAM_STR);
      $stmt->bindValue(":categoryId", $this->_categoryId, PDO::PARAM_INT);
  
      // Execute query and return new ID
      // true means return the new ID (primary key value)
      return $this->_db->executeNonQuery($stmt, true);

    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * Update a item using values in object's properties
   *
   * @param integer $id The current ID of the item to update
   * @return bool True if update successful
   */
  public function updateItem(int $id): bool
  {
    try {

      // NODO: Add validation to make sure data is OK before updating the database
      
      // Open the database connection
      $this->_db->connect();

      // Define query, prepare statement, bind parameters
      $sql = <<<SQL
        UPDATE 	item
        SET 	  itemName = :itemName, price = :price, salePrice = :salePrice, description = :description
        WHERE 	itemID = :itemID
      SQL;
      $stmt = $this->_db->prepareStatement($sql);
      $stmt->bindValue(":itemID", $id, PDO::PARAM_INT);
      $stmt->bindValue(":itemName", $this->_itemName, PDO::PARAM_STR);
      $stmt->bindValue(":price", $this->_price, PDO::PARAM_STR);
      $stmt->bindValue(":salePrice", $this->_salePrice, PDO::PARAM_STR);
      $stmt->bindValue(":description", $this->_description, PDO::PARAM_STR);

      // Execute query and return success value (true/false)
      return $this->_db->executeNonQuery($stmt);

    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * Delete a item by ID
   *
   * @param integer $id The ID of the item to delete
   * @return bool True if delete successful
   */
  public function deleteItem(int $id): bool
  {
    try {
      
      // Open the database connection
      $this->_db->connect();

      // Define query, prepare statement, bind parameters
      $sql = <<<SQL
        DELETE
        FROM 	  item
        WHERE 	itemID = :itemID
      SQL;
      $stmt = $this->_db->prepareStatement($sql);
      $stmt->bindValue(":itemID", $id, PDO::PARAM_INT);

      // Execute query and return success value (true/false)
      return $this->_db->executeNonQuery($stmt);

    } catch (Exception $ex) {
      throw $ex;
    }
  }
  #endregion

}