<div class="flex items-center justify-center w-full h-full bg-[url('/../img/bg_pattern.jpg')] bg-cover">
    <div class="flex flex-col items-center w-3/4 p-8 shadow-xl h-3/4 bg-slate-950 bg-opacity-95 rounded-xl">
        <div class="w-full mb-4">
            <h1 class="m-4 text-4xl font-bold text-center">New bank account</h1>
            <hr class="w-full">
        </div>
        <div class="grid w-full h-full grid-cols-2">
            <div class="flex flex-col items-center gap-8 border-r-2 border-slate-600">
                <div class="flex items-center justify-center h-24 text-2xl text-center text-red-500"><?= $data['error'] ?></div>
                <form class="flex flex-col w-full gap-8 px-10" action="" method="POST">
                    <input type="hidden" name="number" value="<?= $data['number'] ?>">
                    <input id='name' class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Name" type="text" name="name" oninput="
                    let name = document.getElementById(`name`)
                    document.getElementById(`cardName`).innerHTML = name.value+' ';                 
                    ">
                    <input id='lastName' class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Last name" type="text" name="lastName" oninput="
                    let lastName = document.getElementById(`lastName`)
                    document.getElementById(`cardLastName`).innerHTML = lastName.value; 
                    ">
                    <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Personal Code" type="number" name="personalCode">
                    <button class="p-4 text-xl font-bold bg-blue-700 rounded-3xl hover:bg-blue-500" type="submit">Create</button>
                </form>
            </div>
            <div class="relative flex items-center justify-center text-sm select-none">
                <img class="scale-110 shadow-xl rounded-2xl" src=<?= URL . "img/creditCard.jpg" ?> alt="credit card">
                <div class="absolute top-44 right-32">
                    <img class="w-16 h-16" src=<?= URL . "img/deposit.svg" ?> alt="bank logo">
                    <p class="text-xs tracking-widest text-center font-extralight">PHP Bank</p>
                </div>
                <p class="absolute left-36">Card number<br><span class="font-bold tracking-widest"><?= substr($data['number'], 0, 4) . ' ' . substr($data['number'], 4, 4) . ' ' . substr($data['number'], 8, 4) . ' ' . substr($data['number'], 12, 4) . ' ' . substr($data['number'], 16, 4) ?></span></p>
                <p class="absolute bottom-48 left-36">Name<br><span id='cardName' class="font-bold tracking-widest">&nbsp</span><span id='cardLastName' class="font-bold tracking-widest">&nbsp</span></p>
                <p class="absolute bottom-48 right-36">Expiry<br><span class="font-bold tracking-widest">12/28</span></p>
            </div>
        </div>
    </div>
</div>
</body>

</html>