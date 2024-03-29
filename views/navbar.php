<body class="flex h-screen m-0 overflow-hidden text-white bg-slate-950">
    <div class="flex flex-col justify-between h-screen p-4 pb-2 border-r-2 min-w-80 bg-slate-900 border-neutral-700">
        <div class="flex flex-col items-center">
            <div class="text-center">
                <img class="w-32 h-32" src=<?= URL . "img/deposit.svg" ?> alt="logo">
                <h1 class="text-2xl font-extrabold tracking-widest">PHP Bank</h1>
                <h3 class="font-semibold leading-none text-teal-600">Financial institution</h1>
            </div>
            <div class="flex flex-col items-start w-full gap-6 pl-8 mt-14">
                <a class="flex gap-4 text-2xl hover:text-teal-600 hover:underline" href=<?= URL . "" ?>><img class="w-7 h-w-7" src=<?= URL . "img/home.svg" ?> alt="">Home</a>
                <a class="flex gap-4 text-2xl hover:text-teal-600 hover:underline" href=<?= URL . "new" ?>><img class="w-7 h-w-7" src=<?= URL . "img/create.svg" ?> alt="">Create Account</a>
                <a class="flex gap-4 text-2xl hover:text-teal-600 hover:underline" href=<?= URL . "users" ?>><img class="w-7 h-w-7" src=<?= URL . "img/list.svg" ?> alt="">User List</a>
            </div>
        </div>
        <div class="flex flex-col items-center">
            <div class="flex flex-col items-start w-full gap-6 pl-8 mt-14">
                <p class="w-full text-center text-green-600"><?= $_SESSION['globalMessage'] ?? '' ?></p>
                <?php if (isset($_SESSION['id'])) { ?>
                    <div class="flex gap-4">
                        <img class="w-20 h-20 rounded-full" src=<?= URL . "img/pfp.jpg" ?> alt="profile picture">
                        <div>
                            <h1 class="font-bold"><?= $_SESSION['username'] ?></h1>
                            <h2 class="text-teal-600"><?= $_SESSION['userRole'] ?></h2>
                            <a class="flex gap-2 text-xl hover:text-teal-600" href=<?= URL . "logout" ?>>Log Out<img class="w-7 h-w-7" src="img/logout.svg" alt=""></a>
                        </div>
                    </div>

                <?php } else { ?>
                    <a class="flex gap-4 text-2xl hover:text-teal-600 hover:underline" href=<?= URL . "login" ?>><img class="w-7 h-w-7" src="img/login.svg" alt="">Log In</a>
                    <a class="flex gap-4 text-2xl hover:text-teal-600 hover:underline" href=<?= URL . "register" ?>><img class="w-7 h-w-7" src="img/signup.svg" alt="">Sign Up</a>
                <?php } ?>
                <div class="flex w-full mt-4 justify-evenly">
                    <p class="font-bold <?= $_SESSION['db'] === 'file' ? 'text-teal-600' : '' ?>">File</p>
                    <form action="/" method="POST" id='dbToggle'>
                        <label class="relative inline-flex items-center cursor-pointer" onclick="document.getElementById('dbToggle').submit()">
                            <input id="switch-3" type="checkbox" class="sr-only peer" <?= $_SESSION['db'] === 'database' ? 'checked' : '' ?> />
                            <label for="switch-3" class="hidden"></label>
                            <div class="peer h-4 w-11 rounded border bg-slate-700 after:absolute after:-top-1 after:left-0 after:h-6 after:w-6 after:rounded-md after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-teal-600 peer-checked:after:translate-x-full peer-focus:ring-teal-600"></div>
                        </label>
                    </form>
                    <p class="font-bold <?= $_SESSION['db'] === 'database' ? 'text-teal-600' : '' ?>">Database</p>
                </div>
            </div>
            <p class="mt-16 text-sm font-bold text-center text-gray-700">© 2024 "PHP bank"</p>
        </div>
    </div>
</body>