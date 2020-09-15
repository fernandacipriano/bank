<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankRequest;
use App\Bank;

class BankController extends Controller
{
    private $bank;

    public function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }

    public function transaction(StoreBankRequest $request)
    {

        $lastBalance = $this->getBalance($request->count_number);

        $create = $this->bank->create([
            'count_number' => $request->count_number,
            'amount' => $request->amount,
            'balance' => $lastBalance
        ]);

        $label = ($request->amount < 0) ? Bank::LABEL_SACAR : Bank::LABEL_DEPOSITAR;

        if ($label === Bank::LABEL_SACAR && ($request->amount > $lastBalance || $lastBalance < 0)) {
            return [
                "errors" => [
                    [
                        "message" => "Saldo insuficiente."
                    ]
                ]
            ];
        }

        return [
            'data' => [
                $label =>
                [
                    'conta' => $create->count_number,
                    'saldo' => $create->balance
                ]
            ]
        ];
    }

    public function balance($count_number)
    {
        return [
            'data' => [
                'saldo' => [
                    $this->getBalance($count_number)
                ]
            ]
        ];
    }

    public function getBalance($countNumber)
    {
        $balance = $this->bank->where('count_number', $countNumber)->orderBy('created_at', 'DESC')->first();

        return ($balance === null) ? 0 : (float) $balance->balance;
    }
}
