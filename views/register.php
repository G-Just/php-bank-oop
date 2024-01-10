<div class="flex items-center justify-center w-full h-full">
    <div class="border-neutral-700 border-solid border-2 shadow-lg rounded-3xl flex w-4/5 bg-transparent h-5/6 bg-[url('./../../public/img/landscape2_dark.jpg')] bg-cover bg-no-repeat bg-left box-border bg-slate-900 overflow-clip">
        <div class="w-1/2 px-24 pt-20 -m-px bg-slate-900 rounded-3xl">
            <h1 class="m-4 text-4xl font-bold text-center">Sign Up</h1>
            <hr class="mb-24">
            <form class="flex flex-col gap-8" action="../App/_includes/login_h.php" method="POST">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Username" type="text" name="username">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Email Address" type="email" name="email">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Password" type="password" name="password">
                <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Confirm Password" type="password" name="confirmPassword">
                <button class="p-4 bg-blue-900 rounded-3xl" type="submit">Sign up</button>
                <p class="text-center">Already have an account? <a class="underline hover:text-slate-700" href="./login.php">Log In</a></p>
            </form>
        </div>
        <div class="w-1/2 "></div>
    </div>
</div>
</body>

</html>