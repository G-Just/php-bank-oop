<body class="flex h-screen m-0 overflow-hidden text-white bg-slate-950">
    <div class="flex flex-col justify-between h-screen p-4 pb-2 border-r-2 min-w-80 bg-slate-900 border-neutral-700">
        <div class="flex flex-col items-center">
            <div class="text-center">
                <img class="w-32 h-32" src=<?= URL . "img/deposit.svg" ?> alt="logo">
                <h1 class="text-2xl font-extrabold tracking-widest">PHP Bank</h1>
                <h3 class="font-semibold leading-none text-teal-600">Financial institution</h1>
            </div>
            <div class="flex flex-col items-start w-full gap-6 pl-8 mt-14">
                <a class="flex gap-4 text-2xl hover:text-teal-600 hover:underline" href="./"><img class="w-7 h-w-7" src=<?= URL . "img/home.svg" ?> alt="">Home</a>
                <a class="flex gap-4 text-2xl hover:text-teal-600 hover:underline" href="./new"><img class="w-7 h-w-7" src=<?= URL . "img/create.svg" ?> alt="">Create account</a>
                <a class="flex gap-4 text-2xl hover:text-teal-600 hover:underline" href="./users"><img class="w-7 h-w-7" src=<?= URL . "img/list.svg" ?> alt="">User List</a>
            </div>
        </div>
        <div class="flex flex-col items-center">
            <div class="flex flex-col items-start w-full gap-6 pl-8 mt-14">
                <?php if (isset($_SESSION['id'])) { ?>
                    <div class="flex gap-4">
                        <img class="w-20 h-20 rounded-full" src=<?= URL . "img/pfp.jpg" ?> alt="profile picture">
                        <div>
                            <h1 class="font-bold"><?= $_SESSION['username'] ?></h1>
                            <h2 class="text-teal-600"><?= $_SESSION['role'] ?></h2>
                            <a class="flex gap-2 text-xl hover:text-teal-600" href="./logout">Log Out<img class="w-7 h-w-7" src="img/logout.svg" alt=""></a>
                        </div>
                    </div>
                <?php } else { ?>
                    <a class="flex gap-4 text-2xl hover:text-teal-600 hover:underline" href="./login"><img class="w-7 h-w-7" src="img/login.svg" alt="">Log In</a>
                    <a class="flex gap-4 text-2xl hover:text-teal-600 hover:underline" href="./register"><img class="w-7 h-w-7" src="img/signup.svg" alt="">Sign Up</a>
                <?php } ?>
            </div>
            <p class="mt-16 text-sm font-bold text-center text-gray-700">© 2024 "PHP bank"</p>
        </div>
    </div>
</body>