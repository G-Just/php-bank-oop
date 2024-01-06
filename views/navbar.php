<body class="bg-slate-950 h-screen m-0 text-white flex overflow-hidden">

    <div class="p-4 pb-20 min-w-80 h-screen bg-slate-900 border-r-2 border-neutral-700 flex flex-col justify-between">
        <div class="flex flex-col items-center">
            <div class="text-center">
                <img class="w-32 h-32" src="img/logo.svg" alt="logo">
                <h1 class="text-2xl font-extrabold tracking-widest">PHP Bank</h1>
                <h3 class="text-teal-600 font-semibold leading-none">Financial institution</h1>
            </div>
            <div class="mt-14 flex flex-col items-start gap-6 w-full pl-8">
                <a class="flex gap-4 text-2xl hover:text-slate-500 hover:underline" href="./"><img class="w-7 h-w-7" src="../public/img/home.svg" alt="">Home</a>
                <a class="flex gap-4 text-2xl hover:text-slate-500 hover:underline" href="./newAccount.php"><img class="w-7 h-w-7" src="../public/img/create.svg" alt="">Create account</a>
            </div>
        </div>
        <div class="flex flex-col items-center">
            <div class="mt-14 flex flex-col items-start gap-6  w-full pl-8">
                <a class="flex gap-4 text-2xl hover:text-slate-500 hover:underline" href="../public/login.php"><img class="w-7 h-w-7" src="../public/img/login.svg" alt="">Log In</a>
                <?php if (isset($_SESSION['id'])) { ?>
                    <a class="flex gap-4 text-2xl hover:text-slate-500" href="../public/logout.php"><img class="w-7 h-w-7" src="../public/img/logout.svg" alt="">Log Out</a>
                <?php } else { ?>
                    <a class="flex gap-4 text-2xl hover:text-slate-500 hover:underline" href="../public/register.php"><img class="w-7 h-w-7" src="../public/img/signup.svg" alt="">Sign Up</a>
                <?php } ?>
            </div>
        </div>
    </div>