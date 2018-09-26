<?php

namespace App\Controller;
use App\Model\Product;

class ProductsController extends Controller {

    public function products()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT * FROM category, product WHERE category.id = product.category_id ORDER BY product.name';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $products = $sth->fetchAll(\PDO::FETCH_CLASS, Product::class);

        return $this->render("products/index.html.php", [
            'products' => $products,
            'token' => $this->getToken(),
        ]);       
    }

    public function delete($id)
    {
        if (!$this->isCsrfTokenValid()){
            throw new \UnexpectedValueException("Invalide token");
        }
        $sql = "DELETE FROM product WHERE product.id=:id";
        $sth = $this->getPdo()->prepare($sql);
        $sth->bindValue(":id", (int) $id, \PDO::PARAM_INT);
        $sth->execute();       
        $response = $this->getResponse();
        $response->setHeader([
            "Location" => "./../../products"
        ]);
        return $response;
    }

    public function create()
    {
        if (!$this->isCsrfTokenValid()){
            throw new \UnexpectedValueException("Invalide token");
        }
        $name = $this->get("name", Product::NAME);
        $category_id = $this->get("category_id", Product::CATEGORY_ID);
        $unit = $this->get("unit", Product::UNIT);
        $gram = $this->get("gram", Product::GRAM);
        if ($name && $category_id && $unit && $gram) {
            $sql = "INSERT INTO product(name, category_id, unit, gram) VALUE (:name, :category_id, :unit, :gram)";
            $sth = $this->getPdo()->prepare($sql);
            $sth->bindValue(":name", $name, \PDO::PARAM_STR);
            $sth->bindValue(":category_id", (int) $category_id, \PDO::PARAM_INT);
            $sth->bindValue(":unit", (int) $unit, \PDO::PARAM_INT);
            $sth->bindValue(":gram", (int) $gram, \PDO::PARAM_INT);
            $sth->execute();   
            $response = $this->getResponse();
            $response->setHeader([
                "Location" => "./../products"
            ]);
            return $response;        
        }
    }

    public function updates()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT * FROM category, product WHERE category.id = product.category_id ORDER BY product.name';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $products = $sth->fetchAll(\PDO::FETCH_CLASS, Product::class);

        return $this->render("updates/index.html.php", [
            'products' => $products,
            'token' => $this->getToken(),
        ]);    
    }
}