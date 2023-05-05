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
        <div class ="row">
            <div class = "col-6">
                <div class="mb-3">
                    <label class="form-label" for="FirstName">First Name</label>
                    <input class="form-control" type="text" id="FirstName" name="FirstName" required maxlength="70" />
                </div>
            </div>
            <div class = "col-6">
                <div class="mb-3">
                    <label class="form-label" for="LastName">Last Name</label>
                    <input class="form-control" type="text" id = "LastName" name="LastName" required maxlength="70" />
                </div>
            </div>
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
        <input type="submit" class="mt-3 btn btn-primary" value="Confirm Order" name="ProceedWithCheckout"/>
    </form>
    
</div>



<script>
    function validate(form) {
        return true;
    }
</script>
<?php
if (isset($_POST["ProceedWithCheckout"]))
{
$stmt = $db->prepare("SELECT Items.stock as PQ, Items.name as PN, Cart.item_id, Items.cost as PP, Cart.desired_quantity as CQ, Cart.unit_price as CP FROM Cart INNER JOIN Items ON Cart.item_id = Items.id WHERE Cart.user_id = :uid");
// echo $stmt;
try {
    $stmt->execute([":uid" => $user_id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("<pre>" . var_export($e, true) . "</pre>");
}

$isValid = true;
foreach ($results as $item){
    $PQ = intval(se($item, "PQ", 0, false));
    $PN = se($item, "PN", 0, false);
    if (intval(se($item, "PP", 0, false)) != intval(se($item, "CP", 0, false)))
    {
        $isValid = false;
        flash("Prices do not match!", "danger");
    }
    if (intval(se($item, "PQ", 0, false)) < intval(se($item, "CQ", 0, false)))
    {
        $isValid = false;
        flash("We don't have enough stock!. The item with the stock issue is ".$PN." and you can only buy ".$PQ." of it", "danger");
    }
}

if ($isValid != true)
{
    redirect("cart.php");
}
else
{
    $stmtNEW = $db->prepare("INSERT INTO Orders (user_id, payment_method, address, total_price) VALUES(:user, :payment, :address, :total_price)");
    try 
    {
        $stmtNEW->execute([":user" => $user_id, ":payment" => $PaymentType, ":address" => $Address , ":total_price" => $TotalCostCheck]);
        $order_id = $db->lastInsertId();
    } 
    catch (PDOException $e) 
    {
        error_log(var_export($e, true));
    }

    foreach($results as $data)
    {

        $itemId = $data['item_id'];
        $unit_price = $data['CP'];
        $desired_quantity = $data['CQ'];
        $stmtNEW2 = $db->prepare("INSERT INTO OrderItems(item_id, desired_quantity, unit_price, order_id) Values(:item_id, :desired_quantity, :unit_price, :order_id)");
        $resultOrders = $stmtNEW2->execute([":order_id" => $order_id, ":item_id" => $itemId, ":desired_quantity" => $desired_quantity , ":unit_price" => $unit_price]);
    }

    $stmtNEW3 = $db->prepare("UPDATE Items set stock = stock - (select desired_quantity from Cart where item_id = Items.id and user_id = :uid) WHERE id in (SELECT item_id from Cart WHERE Cart.user_id = :uid)");
        try 
        {
            $stmtNEW3->execute([":uid" => $user_id]);
        } 
        catch (PDOException $e) 
        {
            error_log(var_export($e, true));
        }
    
    $newSTMT4 = $db->prepare("DELETE FROM Cart WHERE user_id = :user_id");
        try 
        {
            $newSTMT4->execute([":user_id" => $user_id]);
        }   
        catch (PDOException $e) 
        {
            error_log(var_export($e, true));
            flash("<pre>" . var_export($e, true) . "</pre>");
        }

    redirect("OrderConfirmation.php?id=$order_id");
}
}
require(__DIR__ . "/../../partials/flash.php");

?>