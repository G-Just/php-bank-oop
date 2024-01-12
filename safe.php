<table class="w-full text-left border-separate border-spacing-7">
    <thead class="sticky top-0 text-xl font-bold text-gray-500 bg-slate-800">
        <th>Owner</th>
        <th>Personal code</th>
        <th>Account number</th>
        <th>Balance</th>
    </thead>
    <tbody>
        <?php foreach ($data[0] as $user) : ?>
            <tr class="w-full text-xl font-bold tracking-wider cursor-pointer">
                <td><?= $user['lastName'] . ' ' . $user['name'] ?></td>
                <td><?= $user['personalCode'] ?></td>
                <td><?= $user['number'] ?></td>
                <td><?= '$' . number_format($user['balance'], 2) ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>