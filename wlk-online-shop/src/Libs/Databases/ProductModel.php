<?php
namespace App\WlkOnlineShop\Databases;

use PDO;
use PDOException;


class ProductModel
{
    private $db = null;
    public function __construct($db){
        $this->db = $db->connect();
    }

    public function productCreate($data){
        try{
            $query = "INSERT INTO products(product_name, category_id, price, old_price, qty, description, file_name, product_status) VALUES(:product_name, :category_id, :price, :old_price, :qty, :description, :file_name, :product_status)";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ':product_name'=> $data['product_name'],
                ':category_id'=> $data['category_id'],
                ':price'=> $data['price'],
                ':old_price'=> $data['old_price'],
                ':qty'=> $data['qty'],
                ':description'=> $data['description'],
                ':file_name'=> $data['file_name'],
                ':product_status'=> $data['product_status'],
            ]);
            return true;

        }catch(PDOException $e){
            
        }
    }

    //getAllProduct
    public function GetAllProduct()
    {
    $sql = "SELECT products.*, products.id AS p_id, categories.category_name FROM products INNER JOIN categories ON products.category_id = categories.id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //getproductbyID
    public function GetProductById($id){
        try{
            $query = "SELECT products.*, products.id AS p_id, categories.id AS c_id, categories.* FROM products  INNER JOIN categories on products.category_id=categories.id WHERE products.id=:id";
            $statement = $this->db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $result = $statement->fetch();
            return $result;
        }catch(PDOException $e){
            
        }
    }

    //updateProduct
    public function ProductUpdate($id, $product_name, $category_id, $price, $old_price, $qty, $description){
        try{
            $query = "UPDATE products SET product_name=:product_name, category_id=:category_id, price=:price, old_price=:old_price, qty=:qty, description=:description WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->bindParam(":product_name", $product_name);
            $statement->bindParam(":category_id", $category_id);
            $statement->bindParam(":price", $price);
            $statement->bindParam(":old_price", $old_price);
            $statement->bindParam(":qty", $qty);
            $statement->bindParam(":description", $description);
            $statement->execute();
            return true;
        }catch(PDOException $e){
            
        }
    }

    //productDelete
    public function productDelete($id){
        try{
            $query = "DELETE FROM products WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            return true;
        }catch(PDOException $e){
            
        }
    }

    //productStatus Change
    public function productStatus($id, $product_status){
        try{
            $query = "UPDATE products SET product_status=:product_status WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->bindParam(":product_status", $product_status);
            $statement->execute();
            return true;
        }catch(PDOException $e){
            
        }
    }

    //productImageUpdate
    public function ProductPhotoUpdate($id, $file_name){
        try{
            $query = "UPDATE products SET file_name=:file_name WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->bindParam(":file_name", $file_name);
            $statement->execute();
            return true;
        }catch(PDOException $e){
            
        }
    }

    //get all products with pagination
    public function ProductPagination($start, $limit){
        try{
            $query = "SELECT products.*, products.id AS p_id, categories.id AS c_id, categories.* FROM products INNER JOIN categories on products.category_id=categories.id LIMIT $start , $limit";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        }catch(PDOException $e){
            
        }
    }

    //search product
    public function ProductSearch($search){
        try{
            $query = "SELECT products.*, products.id AS p_id, categories.id AS c_id, categories.* FROM products INNER JOIN categories on products.category_id=categories.id WHERE products.product_name LIKE '%$search%' OR categories.category_name LIKE '%$search%'";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        }catch(PDOException $e){
            
        }
    }
    
    
    

}

?>

