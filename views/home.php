<body>
    <div class="p-4 grid grid-cols-3 grid-rows-2 w-full gap-4 bg-[url('/../img/bg_pattern.jpg')] bg-cover">
        <div class="relative col-span-3 pt-4 pb-8 text-center rounded-lg shadow-lg bg-slate-800">
            <h1 class="text-2xl font-bold">Accounts</h1>
            <div class="h-full overflow-y-auto">
                <?php if (isset($_SESSION['id'])) { ?>
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
                                <tr onclick="window.location=`/account/dashboard/<?= $user['id'] ?>`;" class="cursor-pointer hover:bg-slate-900 hover:text-teal-600">
                                    <td class="px-5 py-5 text-lg border-b border-neutral-600x">
                                        <div class="flex items-center">
                                            <div>
                                                <p class=whitespace-no-wrap ">
                                                <?= $user['lastName'] . ' ' . $user['name'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class=" px-5 py-5 text-lg border-b border-neutral-600x">
                                                <p class="text-left whitespace-no-wrap "><?= $user['personalCode'] ?></p>
                                    </td>
                                    <td class="px-5 py-5 text-lg border-b border-neutral-600x">
                                        <p class="text-left whitespace-no-wrap ">
                                            <?= $user['number'] ?>
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-lg border-b border-neutral-600x">
                                        <p class="text-left whitespace-no-wrap ">
                                            <?= '$' . number_format($user['balance'], 2) ?>
                                        </p>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php } else { ?>
                            <p class="absolute text-2xl -translate-x-1/2 top-1/2 left-1/2">Login to view account data</p>
                        <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
        <div class="p-8 pt-4 overflow-hidden text-center rounded-lg shadow-lg bg-slate-800">
            <h1 class="mb-4 text-2xl font-bold">Log</h1>
            <div class="flex flex-col h-full pt-4 overflow-y-auto gap-11">
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
        <div class="col-span-2 p-8 pt-4 overflow-hidden text-center rounded-lg shadow-lg bg-slate-800">
            <h1 class="mb-2 text-2xl font-bold">Statistics</h1>
            <div class="grid h-full grid-cols-3 gap-4 pt-4 pb-8">
                <div class="pl-2 bg-teal-800 rounded-xl bg-clip-padding">
                    <div class="relative flex flex-col items-center justify-center h-full -mr-px bg-slate-900 rounded-xl">
                        <p class="px-2 text-4xl font-bold"><?= $data['stats'][0]['accountCount'] ?></p>
                        <p class="mt-2 text-sm text-teal-600">Opened bank accounts</p>
                    </div>
                </div>
                <div class="pl-2 bg-emerald-800 rounded-xl bg-clip-padding">
                    <div class="relative flex flex-col items-center justify-center h-full -mr-px bg-slate-900 rounded-xl">
                        <p class="px-2 text-4xl font-bold"><?= $data['stats'][0]['userCount'] ?></p>
                        <p class="mt-2 text-sm text-teal-600">Registered users</p>
                    </div>
                </div>
                <div class="pl-2 bg-sky-950 rounded-xl bg-clip-padding">
                    <div class="relative flex flex-col items-center justify-center h-full -mr-px bg-slate-900 rounded-xl">
                        <p class="px-2 text-3xl font-bold"><?= '$' . number_format($data['stats'][0]['totalHoldings'], 2) ?></p>
                        <p class="mt-2 text-sm text-teal-600">Total holdings</p>
                    </div>
                </div>
                <div class="pl-2 bg-cyan-800 rounded-xl bg-clip-padding">
                    <div class="relative flex flex-col items-center justify-center h-full -mr-px bg-slate-900 rounded-xl">
                        <p class="px-2 text-3xl font-bold"><?= '$' . number_format($data['stats'][0]['averageHoldings'], 2) ?></p>
                        <p class="mt-2 text-sm text-teal-600">Average balance</p>
                    </div>
                </div>
                <div class="pl-2 bg-lime-900 rounded-xl bg-clip-padding">
                    <div class="relative flex flex-col items-center justify-center h-full -mr-px bg-slate-900 rounded-xl">
                        <p class="px-2 text-3xl font-bold"><?= '$' . number_format($data['stats'][0]['minHoldings'], 2) ?></p>
                        <p class="mt-2 text-sm text-teal-600">Min balance</p>
                    </div>
                </div>
                <div class="pl-2 bg-indigo-900 rounded-xl bg-clip-padding">
                    <div class="relative flex flex-col items-center justify-center h-full -mr-px bg-slate-900 rounded-xl">
                        <p class="px-2 text-3xl font-bold"><?= '$' . number_format($data['stats'][0]['maxHoldings'], 2) ?></p>
                        <p class="mt-2 text-sm text-teal-600">Max balance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>