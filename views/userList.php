</body>
<div class="w-full p-8 rounded-md bg-[url('/../img/bg_pattern.jpg')] bg-cover">
    <div class="flex items-center justify-between pb-6 ">
        <div>
            <h2 class="text-xl font-semibold text-white">User List</h2>
            <span class="text-lg text-teal-600">Bank workers</span>
        </div>
    </div>
    <div>
        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase border-b-2 border-neutral-600 bg-slate-800">
                                Username
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase border-b-2 border-neutral-600 bg-slate-800">
                                Role
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase border-b-2 border-neutral-600 bg-slate-800">
                                Created
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase border-b-2 border-neutral-600 bg-slate-800">
                                Actions
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase border-b-2 border-neutral-600 bg-slate-800">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data[0] as $user) : ?>
                            <tr>
                                <td class="px-5 py-5 text-sm border-b border-neutral-600 bg-slate-900">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-full h-full rounded-full" src="/img/pfp.jpg" alt="user profile picture" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-white whitespace-no-wrap">
                                                <?= $user['username'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 text-sm border-b border-neutral-600 bg-slate-900">
                                    <p class="text-white whitespace-no-wrap"><?= $user['role'] ?></p>
                                </td>
                                <td class="px-5 py-5 text-sm border-b border-neutral-600 bg-slate-900">
                                    <p class="text-white whitespace-no-wrap">
                                        <?= $user['created'] ?>
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm border-b border-neutral-600 bg-slate-900">
                                    <p class="text-white whitespace-no-wrap">
                                        <?= $user['actions'] ?>
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm border-b border-neutral-600 bg-slate-900">
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-white">
                                        <span aria-hidden class="absolute inset-0 <?= $user['status'][1] ?> rounded-full opacity-50"></span>
                                        <span class="relative"><?= $user['status'][0] ?></span>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</html>