<body>
    <div class="w-full h-full bg-[url('/../img/bg_pattern.jpg')] bg-cover">
        <div class="flex justify-between p-10 m-4 mb-0 rounded-lg shadow-lg bg-slate-800">
            <div class="flex flex-col gap-3">
                <h1 class="text-5xl"><?= $data['account']['name'] . ' ' . $data['account']['lastName'] ?></h1>
                <p class="tracking-widest text-teal-600"><?= $data['account']['personalCode'] ?></p>
            </div>
            <div>
                <h1>
                    <p class="text-4xl tracking-widest"><?= $data['account']['number'] ?></p>
                    <p>&nbsp</p>
                </h1>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 m-4">
            <div class="flex flex-col items-center gap-4 p-8 pt-4 rounded-lg shadow-lg bg-slate-800">
                <h1 class="text-5xl">Balance</h1>
                <hr class="w-60 border-px">
                <h1 class="text-8xl"><?= '$' . number_format($data['account']['balance'], 2) ?></h1>
                <div class="grid w-full grid-cols-2 gap-4 m-8 mb-2 text-center">
                    <a class="px-5 py-3 text-xl font-bold border-2 rounded-lg bg-green-950 border-neutral-500 hover:bg-green-700" href=<?= URL . 'account/deposit/' . $data['account']['id'] ?>>Deposit</a>
                    <a class="px-5 py-3 text-xl font-bold bg-orange-900 border-2 rounded-lg border-neutral-500 hover:bg-orange-500" href=<?= URL . 'account/withdraw/' . $data['account']['id'] ?>>Withdraw</a>
                    <a class="col-span-2 px-5 py-3 text-xl font-bold border-2 rounded-lg bg-red-950 border-neutral-500 hover:bg-red-600" href=<?= URL . 'account/delete/' . $data['account']['id'] ?>>Delete</a>
                </div>
            </div>
            <div class="p-8 pt-4 rounded-lg shadow-lg bg-slate-800">
                Stats maybe
            </div>
        </div>
    </div>
</body>

</html>