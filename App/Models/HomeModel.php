<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Db\DataBaseHandler;
use App\Db\FileBaseHandler;

class HomeModel
{
    private $formattedLog = [];
    private $stats = [];
    private $users, $log, $accounts;
    public function __construct($medium)
    {
        $medium === 'file' ? $this->accounts = new FileBaseHandler('data') : $this->accounts = new DataBaseHandler('accounts');
        $medium === 'file' ? $this->users = new FileBaseHandler('users') : $this->users = new DataBaseHandler('users');
        $this->log = $this->users->LogShowAll();
    }
    public function getLog(): array
    {
        foreach ($this->log as $entry) {
            $this->formattedLog[] = [
                'user' => $entry['user'],
                'action' => match ($entry['userAction']) {
                    'deposited' => "deposited <span class='font-bold text-teal-600'>$" . $entry['amount'] . '</span> into account',
                    'withdrew' => "withdrew <span class='font-bold text-teal-600'>$" . $entry['amount'] . '</span> from account',
                    'registered' => "signed up, <br> and is the newest user <span class='font-bold text-teal-600'>Say Hi 👋</span>",
                    default => $entry['userAction']
                },
                'account' => $entry['accountNumber'] === -1 ? '' : $entry['accountNumber'],
                'name' => $entry['account'] === -1 ? '' : "<span class='font-normal text-white'>for</span> " . $entry['account'],
                'time' => $entry['stamp'],
                'image' => match ($entry['userAction']) {
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
        $sum = [0];
        foreach ($this->accounts->showAll() as $account) {
            $sum[] = $account['balance'];
        }
        $this->stats[] = [
            'accountCount' => count($this->accounts->showAll()),
            'userCount' => count($this->users->showAll()),
            'totalHoldings' => array_sum($sum),
            'averageHoldings' => array_sum($sum) / (count($this->accounts->showAll()) === 0 ? 1 : count($this->accounts->showAll())),
            'minHoldings' => min($sum),
            'maxHoldings' => max($sum)
        ];
        return $this->stats;
    }
    public function getAccounts()
    {
        $accounts = $this->accounts->showAll();
        usort($accounts, function ($a, $b) {
            if (($a['lastName'] <=> $b['lastName']) === 0) {
                return $a['firstName'] <=> $b['firstName'];
            } else {
                return $a['lastName'] <=> $b['lastName'];
            }
        });
        return $accounts;
    }
}
