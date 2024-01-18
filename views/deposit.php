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
        <div class="relative w-full p-4">
            <a href=<?= URL . 'account/dashboard/' . $data['account']['id'] ?> class="absolute text-3xl top-8 left-8">&larr; Back</a>
            <div class="flex flex-col items-center gap-4 p-8 pt-4 rounded-lg shadow-lg bg-slate-800">
                <h1 class="text-5xl">Balance</h1>
                <hr class="w-60 border-px">
                <h1 id='bal' class="text-8xl"><?= '$' . number_format($data['account']['balance'], 2) ?></h1>
                <form class="flex flex-col gap-4" action=<?= URL . 'account/handleDeposit/' . $data['account']['id'] ?> method="post">
                    <h1 class="mt-4 text-2xl text-center text-red-500"><?= $_SESSION['error'] ?? '&nbsp' ?></h1>
                    <h1 class="mt-4 text-2xl text-center">Deposit amount:</h1>
                    <div class="flex flex-col gap-2 text-center">
                        <script>
                            function preset(n) {
                                event.preventDefault()
                                document.getElementById('inp').value = n
                                document.getElementById('inp').dispatchEvent(new Event('input'));
                            }
                        </script>
                        <p>Presets:</p>
                        <div class="flex gap-2 justify-evenly">
                            <button class="px-4 py-2 rounded-xl bg-slate-700 hover:bg-slate-600" onclick="preset(1)">$1.00</button>
                            <button class="px-4 py-2 rounded-xl bg-slate-700 hover:bg-slate-600" onclick="preset(10)">$10.00</button>
                            <button class="px-4 py-2 rounded-xl bg-slate-700 hover:bg-slate-600" onclick="preset(100)">$100.00</button>
                            <button class="px-4 py-2 rounded-xl bg-slate-700 hover:bg-slate-600" onclick="preset(1000)">$1000.00</button>
                        </div>
                    </div>
                    <input id='inp' class="px-4 py-2 text-xl font-bold text-white border-2 border-neutral-600 bg-opacity-30 bg-slate-700 rounded-xl" type="number" name="deposit" step="0.01" oninput="
                const output = document.getElementById('expected');
                const inputText = document.getElementById('inp');
                const balance = document.getElementById('bal');
                const trueBalance = +balance.innerText.slice(1).split(',').join('');
                output.innerHTML = `Expected balance : ${trueBalance+(+inputText.value) >= 0 && +inputText.value > 0 ? `$${(trueBalance+(+inputText.value)).toFixed(2)}` : '<?= '$' . number_format($data['account']['balance'], 2) ?>'}`;
                ">
                    <p class="text-center" id='expected'>Expected balance : <?= '$' . number_format($data['account']['balance'], 2) ?></p>
                    <button class="p-4 text-xl font-bold bg-blue-700 rounded-3xl hover:bg-blue-500" type="submit">Deposit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>