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
                    <a class="px-5 py-3 text-xl font-bold border-2 rounded-lg border-neutral-700 bg-emerald-800 bg-opacity-20 hover:bg-opacity-90" href=<?= URL . 'account/deposit/' . $data['account']['id'] ?>>Deposit</a>
                    <a class="px-5 py-3 text-xl font-bold bg-yellow-900 border-2 rounded-lg border-neutral-700 bg-opacity-20 hover:bg-opacity-90" href=<?= URL . 'account/withdraw/' . $data['account']['id'] ?>>Withdraw</a>
                    <a class="col-span-2 px-5 py-3 text-xl font-bold bg-red-800 border-2 rounded-lg border-neutral-700 bg-opacity-20 hover:bg-opacity-90" href=<?= URL . 'account/delete/' . $data['account']['id'] ?>>Delete</a>
                    <p class="col-span-2 text-red-600"><?= $_SESSION['error'] ?? '' ?></p>
                </div>
            </div>
            <div class="h-full p-10 rounded-lg shadow-lg bg-slate-800">
                <canvas id="chart"></canvas>
                <script src="path/to/chartjs/dist/chart.umd.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script>
                    const labels = ['Investments', 'Food', 'Transportation', 'Misc'];
                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'Budget',
                            data: [Math.random() * 3000, Math.random() * 500, Math.random() * 500, Math.random() * 2000],
                            backgroundColor: [
                                'rgba(63, 81, 181, 0.5)',
                                'rgba(77, 182, 172, 0.5)',
                                'rgba(66, 133, 244, 0.5)',
                                'rgba(156, 39, 176, 0.5)',
                                'rgba(233, 30, 99, 0.5)',
                                'rgba(66, 73, 244, 0.4)',
                                'rgba(66, 133, 244, 0.2)',
                            ],
                        }, ],
                    };
                    const configChart = {
                        type: "doughnut",
                        data,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            borderWidth: 1,
                            hoverOffset: 20
                        }
                    };
                    var chartLine = new Chart(
                        document.getElementById("chart"),
                        configChart
                    );
                </script>
            </div>
        </div>
    </div>
</body>

</html>