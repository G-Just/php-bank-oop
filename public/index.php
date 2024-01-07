<?php
require __DIR__ . '/../vendor/autoload.php';
require '../views/head.php';
require '../views/navbar.php';
$AccountData = new App\Classes\AccountDataBaseHandler\AccountDataBaseHandler();
$UserData = new App\Classes\UserDataBaseHandler\UserDataBaseHandler();
$accounts = $AccountData->showAll();
$users = $UserData->showAll();
$log = $AccountData->LogShowAll();
// $AccountData->create(['name' => "Test", 'lastName' => "Tester", 'number' => 'LT009999995641657700', 'personalCode' => '22723842328', 'balance' => 0]);
?>

<div class="flex flex-col w-full gap-4">
    <div class="p-8 pt-4 m-4 mb-0 text-center rounded-lg shadow-lg bg-slate-800 min-h-96">
        <h1 class="text-2xl font-bold">Accounts</h1>
        <div class="h-full overflow-y-auto">
            <table class="w-full text-left border-separate border-spacing-4">
                <thead class="sticky top-0 text-xl font-bold text-gray-500 bg-slate-800">
                    <th>Owner</th>
                    <th>Personal code</th>
                    <th>Account number</th>
                    <th>Balance</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($accounts as $account) : ?>
                        <tr class="w-full font-bold tracking-wider">
                            <td><?= $account['lastName'] . ' ' . $account['name'] ?></td>
                            <td><?= $account['personalCode'] ?></td>
                            <td><?= $account['number'] ?></td>
                            <td><?= '$' . number_format($account['balance'], 2) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex gap-4 m-4 mt-0 min-h-80">
        <div class="flex flex-col w-2/4 gap-8 p-8 pt-4 overflow-hidden text-center rounded-lg shadow-lg bg-slate-800 min-h-80">
            <h1 class="sticky text-2xl font-bold">Log</h1>
            <div class="flex flex-col-reverse gap-12 overflow-y-auto">
                <?php foreach ($log as $entry) : ?>
                    <div class="flex gap-6 relative after:content-[''] after:absolute after:top-14 after:-bottom-10 after:left-6 after:w-px after:bg-gray-500">
                        <img class="w-12 h-12 rounded-full" src="./img/pfp.jpg" alt="user pfp">
                        <div>
                            <p class="text-left">
                                <span class="font-bold">
                                    <?php foreach ($users as $user) {
                                        if ($entry['id'] === $user['id']) {
                                            echo $user['username'];
                                            break;
                                        }
                                    } ?>
                                </span>
                                <?php
                                if ($entry['action'] === 'deposited' || $entry['action'] === 'withdrew') {
                                    echo $entry['action'] . " $<span class='font-bold'></span><span class='font-bold'>" . $entry['amount'] . '</span>';
                                    echo $entry['action'] === "deposited" ? ' into' : ' out of';
                                    echo " account ";
                                } else {
                                    echo $entry['action'] . ' account';
                                }
                                ?>
                                <span class="font-bold">
                                    <?php foreach ($accounts as $account) {
                                        if ($entry['accountID'] === $account['id']) {
                                            echo $account['number'] . "<span class='font-normal'> for</span> " . $account['name'] . ' ' . $account['lastName'];
                                            break;
                                        }
                                    } ?>
                                </span>
                            </p>
                            <p class="text-sm text-left text-gray-500"><?= $entry['time'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="grid w-full gap-8 p-8 pt-4 overflow-hidden text-center rounded-lg shadow-lg bg-slate-800">
            <h1 class="sticky text-2xl font-bold">Statistics</h1>
            <div>Open accounts</div>
            <div>Registered Users</div>
            <div>Total holdings</div>
        </div>
    </div>
</div>

</body>

</html>