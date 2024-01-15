<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Classes\DataBaseHandler;

class HomeModel
{
    private $formattedLog = [];
    private $stats = [];
    private $users, $log, $accounts;
    public function __construct()
    {
        $this->accounts = new DataBaseHandler('data');
        $this->users = new DataBaseHandler('users');
        $this->log = $this->users->LogShowAll();
    }
    public function getLog(): array
    {
        foreach ($this->log as $entry) {
            $this->formattedLog[] = [
                'user' => $entry['user'],
                'action' => match ($entry['action']) {
                    'deposited' => "deposited <span class='font-bold text-teal-600'>$" . $entry['amount'] . '</span> into account',
                    'withdrew' => "withdrew <span class='font-bold text-teal-600'>$" . $entry['amount'] . '</span> from account',
                    'registered' => "signed up, <br> and is the newest user <span class='font-bold text-teal-600'>Say Hi 👋</span>",
                    default => $entry['action']
                },
                'account' => $entry['account'] === -1 ? '' : $entry['accountNumber'],
                'name' => $entry['account'] === -1 ? '' : "<span class='font-normal text-white'>for</span> " . $entry['account'],
                'time' => $entry['time'],
                'image' => match ($entry['action']) {
                    'deposited' => 'deposit.svg',
                    'withdrew' => 'withdraw.svg',
                    'registered' => 'newUser.svg',
                    default => 'created.svg'
                },
            ];
        }
        return $this->formattedLog;
    }
    public function getStats(): array
    {
        $sum = [];
        foreach ($this->accounts->showAll() as $account) {
            $sum[] = $account['balance'];
        }
        $this->stats[] = [
            'accountCount' => count($this->accounts->showAll()),
            'userCount' => count($this->users->showAll()),
            'totalHoldings' => array_sum($sum),
            'averageHoldings' => array_sum($sum) / count($this->accounts->showAll()),
            'minHoldings' => min($sum),
            'maxHoldings' => max($sum)
        ];
        return $this->stats;
    }
    public function getAccounts()
    {
        return $this->accounts->showAll();
    }
}
