<body>
    <div class="w-full h-full bg-[url('/../img/bg_pattern.jpg')] bg-cover">
        <div class="flex justify-between p-10 m-4 mb-0 rounded-lg shadow-lg bg-slate-800">
            <div class="flex flex-col gap-3">
                <h1 class="text-5xl"><?= $data[0]['name'] . ' ' . $data[0]['lastName'] ?></h1>
                <p class="tracking-widest text-teal-600"><?= $data[0]['personalCode'] ?></p>
            </div>
            <div>
                <h1>
                    <p class="text-4xl tracking-widest"><?= $data[0]['number'] ?></p>
                    <p>&nbsp</p>
                </h1>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 m-4">
            <div class="flex flex-col items-center gap-4 p-8 pt-4 rounded-lg shadow-lg bg-slate-800">
                <h1 class="text-5xl">Balance</h1>
                <hr class="w-60 border-px">
                <h1 class="text-8xl"><?= '$' . number_format($data[0]['balance'], 2) ?></h1>
                <div>
                    <a href=<?= URL . 'account/deposit/' . $data[0]['id'] ?>>Deposit</a>
                    <a href=<?= URL . 'account/withdraw/' . $data[0]['id'] ?>>Withdraw</a>
                    <a href=<?= URL . 'account/delete/' . $data[0]['id'] ?>>Delete</a>
                </div>
            </div>
            <div class="p-8 pt-4 rounded-lg shadow-lg bg-slate-800">
                Stats maybe
            </div>
        </div>
    </div>
</body>

</html>