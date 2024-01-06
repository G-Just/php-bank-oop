<?php
require __DIR__ . '/../vendor/autoload.php';
require '../views/head.php';
require '../views/navbar.php';
$data = new App\Classes\AccountDataBaseHandler\AccountDataBaseHandler();
$users = $data->showAll();
?>

<div class="w-full flex flex-col gap-4">
    <div class="text-center m-4 mb-0 bg-slate-800 rounded-lg shadow-lg min-h-96 p-8 pt-4">
        <h1 class="font-bold text-2xl">Accounts</h1>
        <div class="overflow-y-auto h-full no-scrollbar">
            <table class="w-full border-separate border-spacing-4 text-left">
                <thead class="text-xl font-bold text-gray-500 sticky top-0 bg-slate-800">
                    <th>Owner</th>
                    <th>Personal code</th>
                    <th>Account number</th>
                    <th>Balance</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) : ?>
                        <tr class="font-bold tracking-wider w-full">
                            <td><?= $user['lastName'] . ' ' . $user['name'] ?></td>
                            <td><?= $user['personalCode'] ?></td>
                            <td><?= $user['number'] ?></td>
                            <td><?= '$' . number_format($user['balance'], 2) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex flex-col gap-8 text-center w-2/5 m-4 mt-0 bg-slate-800 rounded-lg shadow-lg min-h-80 p-8 pt-4 overflow-hidden">
        <h1 class="font-bold text-2xl sticky">Log</h1>
        <div class="flex flex-col-reverse gap-12 overflow-y-auto no-scrollbar">
            <div class="flex gap-6 relative after:content-[''] after:absolute after:top-14 after:-bottom-10 after:left-6 after:w-px after:bg-gray-500">
                <img class="w-12 h-w-12 rounded-full" src="./img/pfp.jpg" alt="user pfp">
                <div>
                    <p>
                        <span class="font-bold">John Smith</span>
                        created account
                        <span class="font-bold">LT009999995641657718</span>
                    </p>
                    <p class="text-left text-sm text-gray-500">Just Now</p>
                </div>
            </div>
            <div class="flex gap-6 relative after:content-[''] after:absolute after:top-14 after:-bottom-10 after:left-6 after:w-px after:bg-gray-500">
                <img class="w-12 h-w-12 rounded-full" src="./img/pfp.jpg" alt="user pfp">
                <div>
                    <p>
                        <span class="font-bold">John Doe</span>
                        created account
                        <span class="font-bold">LT009999995641657718</span>
                    </p>
                    <p class="text-left text-sm text-gray-500">Just Now</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>