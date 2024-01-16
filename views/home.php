<body>
    <div class="flex flex-col w-full gap-4 bg-[url('/../img/bg_pattern.jpg')] bg-cover">
        <div class="pt-4 pb-8 m-4 mb-0 text-center rounded-lg shadow-lg min-h-96 bg-slate-800">
            <h1 class="text-2xl font-bold">Accounts</h1>
            <div class="h-full overflow-y-auto">
                <table class="min-w-full mb-2 leading-normal">
                    <thead>
                        <tr class="sticky">
                            <th class="sticky top-0 px-5 py-3 text-sm font-semibold tracking-wider text-left text-gray-500 uppercase border-b-2 border-neutral-600 bg-slate-800">
                                Owner
                            </th>
                            <th class="sticky top-0 px-5 py-3 text-sm font-semibold tracking-wider text-left text-gray-500 uppercase border-b-2 border-neutral-600 bg-slate-800">
                                Personal Code
                            </th>
                            <th class="sticky top-0 px-5 py-3 text-sm font-semibold tracking-wider text-left text-gray-500 uppercase border-b-2 border-neutral-600 bg-slate-800">
                                Account Number
                            </th>
                            <th class="sticky top-0 px-5 py-3 text-sm font-semibold tracking-wider text-left text-gray-500 uppercase border-b-2 border-neutral-600 bg-slate-800">
                                Balance
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['accounts'] as $user) : ?>
                            <tr onclick="window.location=`/account/dashboard/<?= $user['id'] ?>`;" class="cursor-pointer hover:bg-slate-900">
                                <td class="px-5 py-5 text-lg border-b border-neutral-600x">
                                    <div class="flex items-center">
                                        <div>
                                            <p class="text-white whitespace-no-wrap ">
                                                <?= $user['lastName'] . ' ' . $user['name'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 text-lg border-b border-neutral-600x">
                                    <p class="text-left text-white whitespace-no-wrap "><?= $user['personalCode'] ?></p>
                                </td>
                                <td class="px-5 py-5 text-lg border-b border-neutral-600x">
                                    <p class="text-left text-white whitespace-no-wrap ">
                                        <?= $user['number'] ?>
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-lg border-b border-neutral-600x">
                                    <p class="text-left text-white whitespace-no-wrap ">
                                        <?= '$' . number_format($user['balance'], 2) ?>
                                    </p>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex gap-4 m-4 mt-0 max-h-96 min-h-96">
            <div class="flex flex-col w-2/4 gap-8 p-8 pt-4 overflow-hidden text-center rounded-lg shadow-lg bg-slate-800 min-h-80">
                <h1 class="sticky text-2xl font-bold">Log</h1>
                <div class="flex flex-col overflow-y-auto gap-11">
                    <?php foreach ($data['log'] as $entry) : ?>
                        <div class="flex gap-6 relative after:content-[''] after:absolute after:top-16 after:-bottom-11 after:left-7 after:w-px after:bg-gray-500">
                            <img class="h-16 rounded-full w-h-16" src="<?= URL . 'img/' . $entry['image'] ?>" alt="action icon">
                            <div>
                                <p class="font-normal text-left">
                                    <span class="font-bold text-teal-600"><?= $entry['user'] ?></span>
                                    <?= $entry['action'] ?><br>
                                    <span class="font-bold">
                                        <?= $entry['account'] ?>
                                    </span>
                                    <span class="font-bold text-teal-600"><?= $entry['name'] ?></span>
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
                        <h2 class="py-2 mb-6 text-2xl bg-slate-900">Open accounts</h2>
                        <p class="px-2 text-2xl font-bold"><?= $data['stats'][0]['accountCount'] ?></p>
                    </div>
                    <div class="w-full h-full pb-4 bg-slate-700 rounded-xl">
                        <h2 class="py-2 mb-6 text-2xl bg-slate-900">Registered Users</h2>
                        <p class="px-2 text-2xl font-bold"><?= $data['stats'][0]['userCount'] ?></p>
                    </div>
                    <div class="w-full h-full pb-4 bg-slate-700 rounded-xl">
                        <h2 class="py-2 mb-6 text-2xl bg-slate-900">Total holdings</h2>
                        <p class="px-2 text-2xl font-bold"><?= '$' . number_format($data['stats'][0]['totalHoldings'], 2) ?></p>
                    </div>
                    <div class="w-full h-full pb-4 bg-slate-700 rounded-xl">
                        <h2 class="py-2 mb-6 text-2xl bg-slate-900">Average balance</h2>
                        <p class="px-2 text-2xl font-bold"><?= '$' . number_format($data['stats'][0]['averageHoldings'], 2) ?></p>
                    </div>
                    <div class="w-full h-full pb-4 bg-slate-700 rounded-xl">
                        <h2 class="py-2 mb-6 text-2xl bg-slate-900">Min balance</h2>
                        <p class="px-2 text-2xl font-bold"><?= '$' . number_format($data['stats'][0]['minHoldings'], 2) ?></p>
                    </div>
                    <div class="w-full h-full pb-4 bg-slate-700 rounded-xl">
                        <h2 class="py-2 mb-6 text-2xl bg-slate-900">Max balance</h2>
                        <p class="px-2 text-2xl font-bold"><?= '$' . number_format($data['stats'][0]['maxHoldings'], 2) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>