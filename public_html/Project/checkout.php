<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$db = getDB();
$results = [];
$user_id = get_user_id();
if (isset($_POST["GoToCheckout"]))
{
    $totalCost=se($_POST,"total_cost", "",false);
    $user_id = se($_POST,"total_cost", "",false);
}

    $FirstName = se($_POST, "FirstName", "", false);
    $LastName = se($_POST, "LastName", "", false);
    $Address = se($_POST, "Address", "", false);
    $City = se($_POST, "City", "", false);
    $State = se($_POST, "State", "", false);
    $Country = se($_POST, "Country", "", false);
    $Zipcode = se($_POST, "Zipcode", "", false);
    $TotalCostCheck = se($_POST, "TotalCostCheck", "", false);
    $PaymentType = se($_POST, "PaymentType", "", false);
?>

<div class="container-fluid">
    <h1>Checkout</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label" for="FirstName">First Name</label>
            <input class="form-control" type="text" id="FirstName" name="FirstName" required maxlength="70" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="LastName">Last Name</label>
            <input class="form-control" type="text" id = "LastName" name="LastName" required maxlength="70" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="Address">Address</label>
            <input class="form-control" type="text" id="Address" name="Address" required minlength="1" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="City">City</label>
            <input class="form-control" type="text" id ="City" name="City" required minlength="1" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="State">State/Province</label>
            <input class="form-control" type="text" id ="State" name="State" required minlength="1" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="Country">Country</label>
            <input class="form-control" type="text" id ="Country" name="Country" required minlength="1" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="Zipcode">Zipcode</label>
            <input class="form-control" type="number" id ="Zipcode" name="Zipcode" required minlength="4" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="TotalCostCheck">Total Cost</label>
            <input class="form-control" type="number" id ="TotalCostCheck" name="TotalCostCheck" value="<?php echo($totalCost)?>" required minlength="1" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="PaymentType">Payment Type</label>
            <input class="form-control" type="text" id ="PaymentType" name="PaymentType" required minlength="1" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Checkout" name = "ProceedWithCheckout"/>
    </form>
</div>

<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        return true;
    }
</script>
<?php
require(__DIR__ . "/../../partials/flash.php");


if (isset($_POST["address"]) && isset($_POST["first_name"]) && isset($_POST["last_name"])) {
    $user_id = get_user_id();

    $db = getDB();
    $stmt = $db->prepare("SELECT name, c.id as line_id, i.stock as stock, item_id, quantity, cost, (cost*quantity) as subtotal FROM Cart c JOIN Items i on c.item_id = i.id WHERE c.user_id = :uid");
    try {
        $stmt->execute([":uid" => $user_id]);
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $total_price = 0;

        $stmt = $db->prepare("INSERT INTO Orders (user_id, total_price, money_received, address, payment_method) VALUES(:user_id, :total_price, :money_received, :address, :payment_method)");

        foreach ($cartItems as $cartItem) {
            $total_price = (int)$total_price + (int)$cartItem['subtotal'];
        }

        try {
            $result = $stmt->execute([
                ":user_id" => $user_id,
                ":total_price" => $total_price,
                ":money_received" => $total_price,
                ":address" => $email = se($_POST, "address", "", false),
                ":payment_method" => 'cash',
            ]);
            $order_id = $db->lastInsertId();
            foreach ($cartItems as $cartItem) {
                $stmt = $db->prepare("INSERT INTO OrderItems (order_id, item_id, desired_quantity, unit_price) VALUES(:order_id, :item_id, :desired_quantity, :unit_price)");

                try {
                    $stmt->execute([
                        ":order_id" => $order_id,
                        ":item_id" => $cartItem['item_id'],
                        ":desired_quantity" => $cartItem['desired_quantity'],
                        ":unit_price" => $cartItem['cost'],
                    ]);
                } catch (PDOException $e) {
                    error_log(var_export($e, true));
                }

                try {
                    $stmtCartDelete = $db->prepare("DELETE FROM Cart where id = :id");
                    $stmtCartDelete->execute([":id" => $cartItem['line_id']]);
                } catch (PDOException $e) {
                    error_log(var_export($e, true));
                }
            }

        } catch (PDOException $e) {
            error_log(var_export($e, true));
        }

        flash("Order confirmed!", "success");
    } catch (PDOException $e) {
        error_log("Error fetching cart" . var_export($e, true));
    }

}

?>