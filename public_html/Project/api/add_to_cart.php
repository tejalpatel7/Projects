<?php
require_once(__DIR__ . "/../../../lib/functions.php");
error_log("add_to_cart received data: " . var_export($_REQUEST, true));
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
//handle the potentially incoming post request
$item_id = (int)se($_POST, "item_id", 0, false);
$desired_quantity = (int)se($_POST, "desired_quantity", 0, false);
$response = ["status" => 400, "message" => "Invalid data"];
http_response_code(400);
if (isset($item_id) && $desired_quantity > 0) {
    echo "thanl you";
    if (is_logged_in()) {
        $db = getDB();

        $getstmt = $db->prepare("SELECT * FROM RM_Cart where item_id =:id and :uid");
        $getstmt->execute([":id" => $item_id, ":uid" => get_user_id()]);
        if ($r) {
            $desired_quantity = $r['quantity'] + $desired_quantity;
        }

        if ($desired_quantity>$stock){
            $response["message"] = "Required quantity is greater than the available stock";
        }
        else{
             //note adding to cart doesn't verify price or quantity
            $stmt = $db->prepare("INSERT INTO RM_Cart (item_id, quantity, user_id) VALUES(:iid, :q, :uid) ON DUPLICATE KEY UPDATE quantity = quantity + :q");
            $stmt->bindValue(":iid", $item_id, PDO::PARAM_INT);
            $stmt->bindValue(":q", $desired_quantity, PDO::PARAM_INT);
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try {
                $stmt->execute();
                $response["status"] = 200;
                $response["message"] = "Item added to cart";
                http_response_code(200);
            } catch (PDOException $e) {
                error_log("Add to cart error: " . var_export($e, true));
                $response["message"] = "Error adding item to cart";
            }
        }
    }else{
        http_response_code(403);
        $response["status"] = 403;
        $response["message"] = "Must be logged in to add to cart";
    }
}

echo json_encode($response);