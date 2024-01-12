<div class="flex items-center justify-center w-full h-full">
    <div class="flex flex-col items-center w-3/4 p-8 shadow-lg h-3/4 bg-slate-800 rounded-xl">
        <div class="w-full mb-4">
            <h1 class="m-4 text-4xl font-bold text-center">New bank account</h1>
            <hr class="w-full">
        </div>
        <div class="grid w-full h-full grid-cols-2">
            <div class="flex items-center justify-center border-r-2 border-slate-600">
                <form class="flex flex-col w-full gap-8 px-10" action="" method="POST">
                    <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Name" type="text" name="name">
                    <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Last name" type="text" name="lastName">
                    <input class="px-4 py-2 font-semibold text-slate-950 rounded-2xl" placeholder="Personal Code" type="number" name="personalCode">
                    <button class="p-4 bg-blue-900 rounded-3xl" type="submit">Log In</button>
                </form>
            </div>
            <div class="relative flex items-center justify-center text-sm">
                <img class="scale-110 shadow-xl  rounded-2xl" src="img/creditCard.jpg" alt="credit card">
                <img class="absolute w-16 h-16 top-48 right-32" src="img/deposit.svg" alt="bank logo">
                <p class="absolute left-36">Card number<br><span class="font-bold tracking-widest">LT27 8472 3894 3823</span></p>
                <p class="absolute bottom-48 left-36">Name<br><span class="font-bold tracking-widest">John Doe</span></p>
                <p class="absolute bottom-48 right-36">Expiry<br><span class="font-bold tracking-widest">12/28</span></p>
            </div>
        </div>
    </div>
</div>
</body>

</html>