<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Classes\DataBaseHandler;

class HomeModel
{
    private $formattedLog = [];
    private $stats = [];
    private $accounts, $users, $log;
    public function __construct()
    {
        $this->accounts = new DataBaseHandler('data');
        $this->users = new DataBaseHandler('users');
        $this->log = $this->users->LogShowAll();
    }
    public function getLog()
    {
        foreach ($this->log as $entry) {
            $this->formattedLog[] = [
                'user' => $this->users->show($entry['id'])['username'],
                'action' => match ($entry['action']) {
                    'deposited' => 'deposited $' . $entry['amount'] . ' into account',
                    'withdrew' => 'withdrew $' . $entry['amount'] . ' from account',
                    default => $entry['action']
                },
                'account' => $this->accounts->show($entry['accountID'])['number'],
                'name' => $this->accounts->show($entry['accountID'])['name'] . ' ' . $this->accounts->show($entry['accountID'])['lastName'],
                'time' => $entry['time'],
                'image' => match ($entry['action']) {
                    'deposited' => 'deposit.svg',
                    'withdrew' => 'withdraw.svg',
                    default => 'created.svg'
                },
            ];
        }
        return $this->formattedLog;
    }
    public function getStats()
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
}
