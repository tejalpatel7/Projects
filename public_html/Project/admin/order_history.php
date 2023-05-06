<?php
require(__DIR__ . "/../../../partials/nav.php");


$db = getDB();



if (isset($_POST["id"]))
{
    $order_id = (int)se($_POST, "order_id", 0, false);
}

$stmt = $db->prepare("SELECT Items.name as PN, Items.description as PD, Items.cost as PP,
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
    <h1>Detailed Order Information</h1>
    <table class="table text-lightgrey">
        <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Cost</th>
            <th>Your quantity</th>
        </thead>
        <?php foreach ($results as $item) : ?>
        <tbody>
                <td><?php se($item, "PN"); ?></td>
                <td><?php se($item, "PD"); ?></td>
                <td><?php se($item, "PP"); ?></td>
                <td><?php se($item, "OQ"); ?></td>

        </tbody>
        <?php endforeach; ?>
    </table>
</div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>

