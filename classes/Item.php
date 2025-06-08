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
  private string $_description;
  private DBAccess $_db;

  #endregion

  #region Constructor - sets up the database connection (using DBAccess)

  public function __construct()
  {
    // Create database connection and store into _db property (so other methods can use DBAccess)
    require INCLUDES_DIR . "database.php";
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
        SELECT  itemID, itemName, price, description
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
        SELECT  ProductID, ProductName, UnitPrice
        FROM    Products
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
    
  #endregion

}