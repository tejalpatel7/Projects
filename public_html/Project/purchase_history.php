<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");

$user_id = get_user_id();
$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT * from Orders WHERE user_id= :user_id");
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
        <h1>List Items</h1>
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Total Price</th>
                <th>Money Received</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach ($results as $index => $record) : ?>
                    <td><?php se($record['total_price']) ?></td>
                    <td><?php se($record['money_received']) ?></td>
                    <td><?php se($record['address']) ?></td>
                    <td><?php se($record['payment_method']) ?></td>
                    <td><?php se($record['created']) ?></td>
                    <td><?php se($record['modified']) ?></td>
                <?php endforeach; ?>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Total Price</th>
                <th>Money Received</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        } );
    </script>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");