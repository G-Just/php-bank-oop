<div class="flex items-center justify-center w-full h-full bg-[url('/../img/bg_pattern.jpg')] bg-cover">
    <div class="border-neutral-700 border-solid border-2 shadow-xl rounded-3xl flex w-4/5 bg-transparent h-5/6 bg-[url('/../img/landscape_dark.jpg')] bg-cover bg-no-repeat">
        <div class="z-10 relative w-1/2 px-24 pt-20 rounded-3xl after:opacity-95 after:rounded-3xl after:content-[''] after:absolute after:top-0 after:bottom-0 after:left-0 after:right-0 after:bg-slate-950 after:-z-10">
            <h1 class="m-4 text-4xl font-bold text-center">Log In</h1>
            <hr>
            <div class="flex items-center justify-center h-24 text-2xl text-center">
                <p class="col-span-2 text-red-600"><?= $_SESSION['error'] ?? '' ?></p>
                <p class="col-span-2 text-green-600"><?= $_SESSION['message'] ?? '' ?></p>
            </div>
            <form class="flex flex-col gap-8" action="" method="POST">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Email Address" type="email" name="email">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Password" type="password" name="password">
                <button class="p-4 text-xl font-bold bg-blue-700 rounded-3xl hover:bg-blue-500" type="submit">Log In</button>
                <p class="text-center">Don't have an account? <a class="underline hover:text-teal-600" href=<?= URL . "register" ?>>Sign Up</a></p>
            </form>
        </div>
        <div class="w-1/2 "></div>
    </div>
</div>
</body>

</html>