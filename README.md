# Teste Fernanda Cipriano

Movimentação de conta bancária 

## Instalação

```
git clone https://github.com/fernandacipriano/bank.git

cd bank

composer install

cp .env.example .env

Criar banco de dados e apontar a aplicação para ele (.env)

php artisan migrate

php artisan serve

```

## Requisições

* Sacar ou depositar valores da conta informada: <br> 
``` 
POST: http://localhost:8000/api/transaction
Params: 
{
    "count_number": "123456-7",
    "amount": 20
}
```
Obs.: o que diferencia se é saque ou depósito é o valor positivo o negativo enviado no campo amount
<br>
<br>
<br>




* Buscar saldo
``` 
GET: http://localhost:8000/api/balance/123456-7
```

