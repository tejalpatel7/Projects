<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$db = getDB();
//handle join
//handle page load

$item_id = 0;
$results = 0;
$user_id = get_user_id();
$isMe = $user_id === get_user_id();
$item_id=se($_GET,"item_id", "",false);

if (isset($_POST["MoreInfo"]))
{
    $item_id=se($_POST,"item_id", "",false);
}
$stmt = $db->prepare("SELECT id, description,stock, cost, name FROM Items WHERE id = :iid");
try {
    $stmt->execute([":iid" => $item_id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("<pre>" . var_export($e, true) . "</pre>");
}

?>

<div class="container-fluid">
    <h1>Detailed Product Information</h1>
    <table class="table text-black">
        <thead>
            <th>Name</th>
            <th>cost</th>
            <th>Description</th>
            <th>stock</th>
        </thead>
        <tbody>
                <td><?php se($results, "name"); ?></td>
                <td><?php se($results, "cost"); ?></td>
                <td><?php se($results, "description"); ?></td>
                <td><?php se($results, "stock"); ?></td>
                <a href="admin/edit_item.php?id=<?php se($results, "id"); ?>">Edit</a>
        </tbody>
    </table>
</div>


<?php
require(__DIR__ . "/../../partials/flash.php");
?>