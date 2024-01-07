<?php
require __DIR__ . '/../vendor/autoload.php';
require '../views/head.php';
require '../views/navbar.php';
?>

<div class="flex items-center justify-center w-full h-full">
    <div class="border-neutral-700 border-solid border-2 shadow-lg rounded-3xl flex w-4/5 bg-transparent h-5/6 bg-[url('./../../public/img/landscape_dark.jpg')] bg-cover bg-no-repeat">
        <div class="w-1/2 px-24 pt-20 bg-slate-900 rounded-3xl">
            <h1 class="m-4 text-4xl font-bold text-center">Log In</h1>
            <hr class="mb-24">
            <form class="flex flex-col gap-8" action="../App/_includes/login_h.php" method="POST">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Email Address" type="email" name="email">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Password" type="password" name="password">
                <button class="p-4 bg-blue-900 rounded-3xl" type="submit">Log In</button>
                <p class="text-center">Don't have an account? <a class="underline hover:text-slate-700" href="./register.php">Sign Up</a></p>
            </form>
        </div>
        <div class="w-1/2 "></div>
    </div>
</div>
</body>

</html>