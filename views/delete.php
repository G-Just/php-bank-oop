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
                <h1 class="mb-4 text-8xl">Are you sure?</h1>
                <p class="text-xl text-center">All account data will be lost!</p>
                <form class="flex gap-4 mt-8" action=<?= URL . 'account/handleDelete/' . $data['account']['id'] ?> method="post">
                    <button class="px-10 py-2 text-4xl bg-green-700 border-2 border-neutral-700 bg-opacity-20 hover:bg-opacity-90 rounded-xl" type="submit">Yes</button>
                    <a class="px-10 py-2 text-4xl bg-red-700 border-2 border-neutral-700 bg-opacity-20 hover:bg-opacity-90 rounded-xl" href="<?= URL . 'account/dashboard/' . $data['account']['id'] ?>">No</a>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>