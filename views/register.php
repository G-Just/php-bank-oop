<div class="flex items-center justify-center w-full h-full bg-[url('/../img/bg_pattern.jpg')] bg-cover">
    <div class="border-neutral-700 border-solid border-2 shadow-xl rounded-3xl flex w-4/5 bg-transparent h-5/6 bg-[url('../img/landscape2_dark.jpg')] bg-cover bg-no-repeat bg-left box-border overflow-clip">
        <div class="relative z-10 w-1/2 px-24 pt-20 -m-px after:opacity-95 after:rounded-3xl after:content-[''] after:absolute after:top-0 after:bottom-0 after:left-0 after:right-0 after:bg-slate-950 after:-z-10 rounded-3xl">
            <h1 class="m-4 text-4xl font-bold text-center">Sign Up</h1>
            <hr>
            <div class="flex items-center justify-center h-24 text-2xl text-center text-red-500"><?= $data['error'] ?></div>
            <form class="flex flex-col gap-8" action="" method="POST">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Username" type="text" name="username">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Email Address" type="email" name="email">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Password" type="password" name="password">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Confirm Password" type="password" name="confirmPassword">
                <button class="p-4 text-xl font-bold bg-blue-700 rounded-3xl hover:bg-blue-500" type="submit">Sign up</button>
                <p class="text-center">Already have an account? <a class="underline hover:text-teal-600" href=<?= URL . "login" ?>>Log In</a></p>
            </form>
        </div>
        <div class="w-1/2 "></div>
    </div>
</div>
</body>

</html>