<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$user_id = get_user_id();
$db = getDB();

if (isset($_GET["id"]))
{
    $order_id = (int)se($_GET, "id", -1, false);
}

if($order_id < 1)
{
    flash("Order ID is incorrect", "danger");
}

$stmt = $db->prepare("SELECT Items.name as PN, Items.description as PD, Items.unit_price as PP,
OrderItems.desired_quantity as OQ, Orders.address as OA, Orders.payment_method as OP, Orders.total_price as OTP
FROM Items INNER JOIN OrderItems ON Items.id = OrderItems.item_id INNER JOIN Orders ON Orders.id = OrderItems.order_id WHERE order_id = :oid");
try {
    $stmt->execute([":oid" => $order_id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("<pre>" . var_export($e, true) . "</pre>");
}
?>
<div class="container-fluid">
    <h1>Your Order Product Information</h1>
    <table class="table text-light">
        <thead>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Description</th>
            <th>Your Quantity</th>
        </thead>
        <?php foreach ($results as $item) : ?>
        <tbody>
                <td><?php se($item, "PN"); ?></td>
                <td><?php se($item, "PP"); ?></td>
                <td><?php se($item, "PD"); ?></td>
                <td><?php se($item, "OQ"); ?></td>
        </tbody>
        <?php endforeach; ?>
    </table>
</div>
<div class="container-fluid">
    <h1>Your Overall Order Information</h1>
    <table class="table text-light">
        <thead>
            <th>Payment Method</th>
            <th>Address</th>
            <th>Total Cost</th>
        </thead>
        <tbody>
                <td><?php se($item, "OP"); ?></td>
                <td><?php se($item, "OA"); ?></td>
                <td><?php se($item, "OTP"); ?></td>
        </tbody>
    </table>
</div>
<div class="container-fluid">
    <h1 style="color:green; text-align:center"><strong>Thank you For Your Order. Have a good day!</strong></h1>
</div>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>