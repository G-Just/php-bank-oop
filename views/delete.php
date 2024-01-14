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
            <form class="flex flex-col gap-4" action=<?= URL . 'account/deposit/' . $data['account']['id'] ?> method="post">
            </form>
        </div>
    </div>
    </div>
</body>

</html>