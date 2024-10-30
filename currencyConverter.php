<?php
// Define currencies and their symbols
$currencies = [
    'USD' => ['name' => 'US Dollar', 'symbol' => '$'],
    'EUR' => ['name' => 'Euro', 'symbol' => '€'],
    'GBP' => ['name' => 'British Pound', 'symbol' => '£'],
    'JPY' => ['name' => 'Japanese Yen', 'symbol' => '¥'],
    'NGN' => ['name' => 'Nigerian Naira', 'symbol' => '₦'],
    'CNY' => ['name' => 'Chinese Yuan', 'symbol' => '¥'],
    'INR' => ['name' => 'Indian Rupee', 'symbol' => '₹'],
    'CAD' => ['name' => 'Canadian Dollar', 'symbol' => 'C$'],
    'AUD' => ['name' => 'Australian Dollar', 'symbol' => 'A$'],
    'CHF' => ['name' => 'Swiss Franc', 'symbol' => 'Fr']
];

// Function to fetch exchange rates (simulated for this example)
function getExchangeRates() {
    // In a real application, you would fetch this data from an API
    return [
        'USD' => 1,
        'EUR' => 0.84,
        'GBP' => 0.72,
        'JPY' => 109.65,
        'NGN' => 1,650,
        'CNY' => 6.47,
        'INR' => 73.51,
        'CAD' => 1.25,
        'AUD' => 1.31,
        'CHF' => 0.92
    ];
}

$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = floatval($_POST['amount']);
    $from = $_POST['from'];
    $to = $_POST['to'];
    
    $rates = getExchangeRates();
    $convertedAmount = $amount * ($rates[$to] / $rates[$from]);
    
    $result = number_format($convertedAmount, 2) . ' ' . $currencies[$to]['symbol'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fancy Currency Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .converter {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 350px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="converter">
        <h1>Currency Converter</h1>
        <form method="post">
            <div class="input-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" step="0.01" required>
            </div>
            <div class="input-group">
                <label for="from">From:</label>
                <select id="from" name="from" required>
                    <?php foreach ($currencies as $code => $details): ?>
                        <option value="<?php echo $code; ?>"><?php echo $details['name'] . ' (' . $details['symbol'] . ')'; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group">
                <label for="to">To:</label>
                <select id="to" name="to" required>
                    <?php foreach ($currencies as $code => $details): ?>
                        <option value="<?php echo $code; ?>"><?php echo $details['name'] . ' (' . $details['symbol'] . ')'; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit">Convert</button>
        </form>
        <?php if ($result): ?>
            <div class="result">
                <?php echo $result; ?>
            </div>
        <?php endif; ?>
    </div>

    <script>
        // Add some interactivity
        document.addEventListener('DOMContentLoaded', function() {
            const fromSelect = document.getElementById('from');
            const toSelect = document.getElementById('to');
            const amount = document.getElementById('amount');

            function updateSymbols() {
                const fromSymbol = fromSelect.options[fromSelect.selectedIndex].text.match(/$$(.*?)$$/)[1];
                const toSymbol = toSelect.options[toSelect.selectedIndex].text.match(/$$(.*?)$$/)[1];
                amount.placeholder = `Enter amount in ${fromSymbol}`;
            }

            fromSelect.addEventListener('change', updateSymbols);
            toSelect.addEventListener('change', updateSymbols);

            updateSymbols();
        });
    </script>
</body>
</html>