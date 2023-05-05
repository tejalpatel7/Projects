<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");

$user_id = get_user_id();
$results = [];
$db = getDB();

$stmt = $db->prepare("SELECT * from Orders WHERE user_id= :user_id ORDER BY created desc LIMIT 10");
try {
    $stmt->execute([":user_id" => $user_id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records", "danger");
}

?>

<div class="container-fluid">
    <h1>Your Order History</h1>
    <table class="table text-lightgrey">
        <thead>
            <th>Total Price</th>
            <th>Payment Type</th>
            <th>Order Date/Time</th>
            <th>Address</th>
            <th>View More Details</th>
        </thead>
        <?php foreach ($results as $item) : ?>
        <tbody>
                <td><?php se($item, "total_price"); ?></td>
                <td><?php se($item, "payment_method"); ?></td>
                <td><?php se($item, "created"); ?></td>
                <td><?php se($item, "address"); ?></td>
                <td>     
                    <form method = "POST" action="MoreOrderInfo.php">
                    <input class="btn btn-primary" type="submit" value="More Info" name="id"/>
                    <input type="hidden" name="order_id" value="<?php se($item, "id"); ?>"/>
                    </form>
                </td>
        </tbody>
        <?php endforeach; ?>
    </table>
</div>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>