<body>
    <div class="flex flex-col w-full gap-4">
        <div class="p-8 pt-4 m-4 mb-0 text-center rounded-lg shadow-lg min-h-96 bg-slate-800">
            <h1 class="text-2xl font-bold">Accounts</h1>
            <div class="h-full overflow-y-auto">
                <table class="w-full text-left border-separate border-spacing-4">
                    <thead class="sticky top-0 text-xl font-bold text-gray-500 bg-slate-800">
                        <th>Owner</th>
                        <th>Personal code</th>
                        <th>Account number</th>
                        <th>Balance</th>
                    </thead>
                    <tbody>
                        <?php foreach ($data[0] as $user) : ?>
                            <tr class="w-full text-xl font-bold tracking-wider cursor-pointer">
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
        <div class="flex gap-4 m-4 mt-0 min-h-80">
            <div class="flex flex-col w-2/4 gap-8 p-8 pt-4 overflow-hidden text-center rounded-lg shadow-lg bg-slate-800 min-h-80">
                <h1 class="sticky text-2xl font-bold">Log</h1>
                <div class="flex flex-col-reverse gap-12 overflow-y-auto">
                    <?php foreach ($data[1] as $entry) : ?>
                        <div class="flex gap-6 relative after:content-[''] after:absolute after:top-14 after:-bottom-10 after:left-6 after:w-px after:bg-gray-500">
                            <img class="w-12 h-12 rounded-full" src="img/pfp.jpg" alt="user pfp">
                            <div>
                                <p class="text-left">
                                    <span class="font-bold">Admin</span>
                                    <?= $entry['action'] ?>
                                    <span class="font-bold">
                                        LT0099999383729382
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