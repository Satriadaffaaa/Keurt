<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Transactions</h2>
    <table>
        <thead>
            <tr>
                <th>Transaction</th>
                <th>Date</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Transaction as $transaction)
            <tr>
                <td>{{ $transaction->transaction }}</td>
                <td>{{ $transaction->date }}</td>
                <td>{{ $transaction->amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>