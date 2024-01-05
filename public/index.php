<?php
require __DIR__ . '/../vendor/autoload.php';
require '../views/head.php';
require '../views/navbar.php';
$data = new App\Classes\AccountDataBaseHandler\AccountDataBaseHandler();
$users = $data->showAll();
?>

<div class="text-center m-8 bg-slate-800 w-1/2 rounded-lg shadow-lg h-min max-h-96 p-8 pt-4 overflow-y-auto no-scrollbar">
    <h1 class="font-bold text-2xl">Accounts</h1>
    <table class="w-full">
        <thead class="font-bold text-gray-500">
            <td>Owner</td>
            <td>Personal code</td>
            <td>Account number</td>
            <td>Balance</td>
            <td>Actions</td>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['lastName'] . ' ' . $user['name'] ?></td>
                    <td><?= $user['personalCode'] ?></td>
                    <td><?= $user['number'] ?></td>
                    <td><?= '$' . number_format($user['balance'], 2) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

</body>

</html>