        <script src="path/to/chartjs/dist/chart.umd.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>

        <body>
            <div class="w-full h-full grid grid-cols-2 grid-rows-10 p-4 gap-4 bg-[url('/../img/bg_pattern.jpg')] bg-cover">
                <div class="flex justify-between col-span-2 row-span-2 p-10 rounded-lg shadow-lg bg-slate-800">
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
                <div class="flex flex-col items-center col-span-1 row-span-5 gap-4 p-8 pt-4 rounded-lg shadow-lg bg-slate-800">
                    <h1 class="text-5xl">Balance</h1>
                    <hr class="w-60 border-px">
                    <h1 class="text-8xl"><?= '$' . number_format($data['account']['balance'], 2) ?></h1>
                    <div class="grid w-full grid-cols-2 gap-4 m-8 mb-px text-center">
                        <a class="px-5 py-3 text-xl font-bold bg-opacity-25 border-2 rounded-lg border-neutral-700 bg-emerald-800 hover:bg-opacity-90" href=<?= URL . 'account/deposit/' . $data['account']['id'] ?>>Deposit</a>
                        <a class="px-5 py-3 text-xl font-bold bg-yellow-700 bg-opacity-25 border-2 rounded-lg border-neutral-700 hover:bg-opacity-90" href=<?= URL . 'account/withdraw/' . $data['account']['id'] ?>>Withdraw</a>
                        <a class="col-span-2 px-5 py-3 text-xl font-bold bg-red-800 bg-opacity-25 border-2 rounded-lg border-neutral-700 hover:bg-opacity-90" href=<?= URL . 'account/delete/' . $data['account']['id'] ?>>Delete</a>
                    </div>
                    <div class="flex">
                        <p class="col-span-2 text-red-600"><?= $_SESSION['error'] ?? '' ?></p>
                        <p class="col-span-2 text-green-600"><?= $_SESSION['message'] ?? '' ?></p>
                    </div>
                </div>
                <div class="grid-cols-1 col-span-1 row-span-5 p-10 rounded-lg shadow-lg bg-slate-800">
                    <canvas id="chart"></canvas>
                    <script>
                        function drawChart() {
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
                        }
                        drawChart();
                    </script>
                </div>
                <div class="col-span-2 row-span-3 rounded-lg shadow-lg bg-slate-800">

                    <canvas class="w-full h-full p-2" id="chartLine"></canvas>
                    <!-- Required chart.js -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <!-- Chart line -->
                    <script>
                        function generateRandomValues() {
                            const arr = [];
                            for (let i = 0; i < 5; i++) {
                                arr.push(Math.random() * <?= $data['account']['balance'] ?>)
                            }
                            return arr;
                        }
                        const labels = ["2019", "2020", "2021", "2022", "2023", "2024"];
                        const values = generateRandomValues();
                        const data = {
                            labels: labels,
                            datasets: [{
                                label: "Balance",
                                backgroundColor: "hsla(242, 50%, 11%, 0.5)",
                                borderColor: "hsl(0, 0%, 100%)",
                                borderWidth: 1,
                                data: [...values, <?= $data['account']['balance'] ?>],
                                fill: true,
                                lineTension: 0.3
                            }, ],
                        };
                        const configLineChart = {
                            type: "line",
                            data,
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        grid: {
                                            color: 'rgba(200,200,200,0.1)',
                                            borderColor: 'white'
                                        },
                                        ticks: {
                                            callback: function(value, index, ticks) {
                                                return '$' + value;
                                            }
                                        }
                                    },
                                    x: {
                                        grid: {
                                            color: 'rgba(200,200,200,0.1)',
                                            borderColor: 'white'
                                        },
                                    }
                                }
                            }
                        };
                        var chartLine = new Chart(
                            document.getElementById("chartLine"),
                            configLineChart
                        );
                    </script>


                </div>
            </div>
        </body>

        </html>