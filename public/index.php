<?php
require __DIR__ . '/../vendor/autoload.php';
require '../views/head.php';
require '../views/navbar.php';
$data = new App\Classes\AccountDataBaseHandler\AccountDataBaseHandler();
$users = $data->showAll();
?>

<div class="w-full flex flex-col gap-4">
    <div class="text-center m-4 mb-0 bg-slate-800 rounded-lg shadow-lg h-min max-h-96 p-8 pt-4 overflow-y-auto no-scrollbar">
        <h1 class="font-bold text-2xl">Accounts</h1>
        <table class="w-full border-separate border-spacing-4">
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
                    <tr class="font-bold tracking-wider">
                        <td><?= $user['lastName'] . ' ' . $user['name'] ?></td>
                        <td><?= $user['personalCode'] ?></td>
                        <td><?= $user['number'] ?></td>
                        <td><?= '$' . number_format($user['balance'], 2) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="text-center w-2/5 m-4 mt-0 bg-slate-800 rounded-lg shadow-lg h-min max-h-96 p-8 pt-4 overflow-y-auto no-scrollbar">
        <h1 class="font-bold text-2xl">Log</h1>
        <div class="flex flex-col">
            <div class="flex content-center">
                <img class="w-12 h-w-12 rounded-full" src="./img/pfp.jpg" alt="user pfp">
                <div>
                    <p>
                        <span class="font-bold">User Userer</span>
                        created account
                        <span class="font-bold">LT2374284792</span>
                        <br><span>Just Now</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>