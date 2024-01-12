<body>
    <div class="flex flex-col w-full gap-4">
        <div class="p-8 pt-4 m-4 mb-0 text-center rounded-lg shadow-lg min-h-96 bg-slate-800">
            <h1 class="text-2xl font-bold">Accounts</h1>
            <div class="h-full overflow-y-auto">
                <table class="w-full text-left border-separate border-spacing-7">
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
                <div class="flex flex-col-reverse overflow-y-auto gap-11">
                    <?php foreach ($data[1] as $entry) : ?>
                        <div class="flex gap-6 relative after:content-[''] after:absolute after:top-16 after:-bottom-11 after:left-7 after:w-px after:bg-gray-500">
                            <img class="h-16 rounded-full w-h-16" src="img/<?= $entry['image'] ?>" alt="user pfp">
                            <div>
                                <p class="text-left">
                                    <span class="font-bold">Admin</span>
                                    <?= $entry['action'] ?><br>
                                    <span class="font-bold">
                                        <?= $entry['account'] ?>
                                    </span>
                                    <span class="font-bold"><?= '(' . $entry['name'] . ')' ?></span>
                                </p>
                                <p class="text-sm text-left text-gray-500"><?= $entry['time'] ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="w-full gap-4 p-10 pt-4 overflow-hidden text-center rounded-lg shadow-lg bg-slate-800">
                <h1 class="mb-2 text-2xl font-bold">Statistics</h1>
                <div class="grid h-full grid-cols-3 gap-4 py-4">
                    <div class="w-full h-full pb-4 bg-slate-700 rounded-xl">
                        <h2 class="py-2 mb-6 text-2xl bg-red-400">Open accounts</h2>
                        <p class="px-2 text-4xl font-bold"><?= $data[2][0]['accountCount'] ?></p>
                    </div>
                    <div class="w-full h-full pb-4 bg-slate-700 rounded-xl">
                        <h2 class="py-2 mb-6 text-2xl bg-orange-400">Registered Users</h2>
                        <p class="px-2 text-4xl font-bold"><?= $data[2][0]['userCount'] ?></p>
                    </div>
                    <div class="w-full h-full pb-4 bg-slate-700 rounded-xl">
                        <h2 class="py-2 mb-6 text-2xl bg-sky-700">Total holdings</h2>
                        <p class="px-2 text-4xl font-bold"><?= '$' . number_format($data[2][0]['totalHoldings'], 2) ?></p>
                    </div>
                    <div class="w-full h-full pb-4 bg-slate-700 rounded-xl">
                        <h2 class="py-2 mb-6 text-2xl bg-emerald-700">Average balance</h2>
                        <p class="px-2 text-4xl font-bold"><?= '$' . number_format($data[2][0]['averageHoldings'], 2) ?></p>
                    </div>
                    <div class="w-full h-full pb-4 bg-slate-700 rounded-xl">
                        <h2 class="py-2 mb-6 text-2xl bg-purple-500">Min balance</h2>
                        <p class="px-2 text-4xl font-bold"><?= '$' . number_format($data[2][0]['minHoldings'], 2) ?></p>
                    </div>
                    <div class="w-full h-full pb-4 bg-slate-700 rounded-xl">
                        <h2 class="py-2 mb-6 text-2xl bg-indigo-800">Max balance</h2>
                        <p class="px-2 text-4xl font-bold"><?= '$' . number_format($data[2][0]['maxHoldings'], 2) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>