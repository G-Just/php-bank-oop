<body class="flex h-screen m-0 overflow-hidden text-white bg-slate-950">

    <div class="flex flex-col justify-between h-screen p-4 pb-20 border-r-2 min-w-80 bg-slate-900 border-neutral-700">
        <div class="flex flex-col items-center">
            <div class="text-center">
                <img class="w-32 h-32" src="img/logo.svg" alt="logo">
                <h1 class="text-2xl font-extrabold tracking-widest">PHP Bank</h1>
                <h3 class="font-semibold leading-none text-teal-600">Financial institution</h1>
            </div>
            <div class="flex flex-col items-start w-full gap-6 pl-8 mt-14">
                <a class="flex gap-4 text-2xl hover:text-slate-500 hover:underline" href="./"><img class="w-7 h-w-7" src="../public/img/home.svg" alt="">Home</a>
                <a class="flex gap-4 text-2xl hover:text-slate-500 hover:underline" href="./newAccount.php"><img class="w-7 h-w-7" src="../public/img/create.svg" alt="">Create account</a>
            </div>
        </div>
        <div class="flex flex-col items-center">
            <div class="flex flex-col items-start w-full gap-6 pl-8 mt-14">
                <a class="flex gap-4 text-2xl hover:text-slate-500 hover:underline" href="../public/login.php"><img class="w-7 h-w-7" src="../public/img/login.svg" alt="">Log In</a>
                <?php if (isset($_SESSION['id'])) { ?>
                    <a class="flex gap-4 text-2xl hover:text-slate-500" href="../public/logout.php"><img class="w-7 h-w-7" src="../public/img/logout.svg" alt="">Log Out</a>
                <?php } else { ?>
                    <a class="flex gap-4 text-2xl hover:text-slate-500 hover:underline" href="../public/register.php"><img class="w-7 h-w-7" src="../public/img/signup.svg" alt="">Sign Up</a>
                <?php } ?>
            </div>
        </div>
    </div>