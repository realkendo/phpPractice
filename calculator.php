<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expression = $_POST['expression'];
    try {
        // Replace scientific functions with their PHP equivalents
        $expression = preg_replace('/(?<![\d.])e(?![\d])/', 'exp(1)', $expression);
        $expression = str_replace('√', 'sqrt', $expression);
        $expression = preg_replace('/(\d+)!/', 'factorial($1)', $expression);
        
        // Define factorial function
        if (!function_exists('factorial')) {
            function factorial($n) {
                if ($n == 0) return 1;
                return $n * factorial($n - 1);
            }
        }
        
        // Evaluate the expression
        $result = eval("return $expression;");
        echo json_encode(['result' => $result]);
    } catch (Exception $e) {
        echo json_encode(['error' => 'Invalid expression']);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scientific Calculator</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .calculator {
            background-color: #000;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        .display {
            background-color: #eee;
            padding: 10px;
            margin-bottom: 10px;
            text-align: right;
            font-size: 24px;
            border-radius: 5px;
        }
        .buttons {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }
        button {
            padding: 15px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            opacity: 0.8;
        }
        .number, .decimal {
            background-color: #4CAF50;
            color: white;
        }
        .operator {
            background-color: #2196F3;
            color: white;
        }
        .function {
            background-color: #FF9800;
            color: white;
        }
        .clear, .equals {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <div class="display" id="display">0</div>
        <div class="buttons">
            <button class="function" onclick="appendToDisplay('sin(')">sin</button>
            <button class="function" onclick="appendToDisplay('cos(')">cos</button>
            <button class="function" onclick="appendToDisplay('tan(')">tan</button>
            <button class="function" onclick="appendToDisplay('log(')">log</button>
            <button class="function" onclick="appendToDisplay('ln(')">ln</button>
            
            <button class="function" onclick="appendToDisplay('√(')">√</button>
            <button class="function" onclick="appendToDisplay('^')">x^y</button>
            <button class="function" onclick="appendToDisplay('e')">e</button>
            <button class="function" onclick="appendToDisplay('π')">π</button>
            <button class="function" onclick="appendToDisplay('!')">x!</button>
            
            <button class="number" onclick="appendToDisplay('7')">7</button>
            <button class="number" onclick="appendToDisplay('8')">8</button>
            <button class="number" onclick="appendToDisplay('9')">9</button>
            <button class="operator" onclick="appendToDisplay('/')">/</button>
            <button class="clear" onclick="clearDisplay()">C</button>
            
            <button class="number" onclick="appendToDisplay('4')">4</button>
            <button class="number" onclick="appendToDisplay('5')">5</button>
            <button class="number" onclick="appendToDisplay('6')">6</button>
            <button class="operator" onclick="appendToDisplay('*')">*</button>
            <button class="operator" onclick="appendToDisplay('(')">(</button>
            
            <button class="number" onclick="appendToDisplay('1')">1</button>
            <button class="number" onclick="appendToDisplay('2')">2</button>
            <button class="number" onclick="appendToDisplay('3')">3</button>
            <button class="operator" onclick="appendToDisplay('-')">-</button>
            <button class="operator" onclick="appendToDisplay(')')">)</button>
            
            <button class="number" onclick="appendToDisplay('0')">0</button>
            <button class="decimal" onclick="appendToDisplay('.')">.</button>
            <button class="function" onclick="appendToDisplay('10^')">EXP</button>
            <button class="operator" onclick="appendToDisplay('+')">+</button>
            <button class="equals" onclick="calculate()">=</button>
        </div>
    </div>

    <script>
        function appendToDisplay(value) {
            const display = document.getElementById('display');
            if (display.innerText === '0' && value !== '.') {
                display.innerText = value;
            } else {
                display.innerText += value;
            }
        }

        function clearDisplay() {
            document.getElementById('display').innerText = '0';
        }

        function calculate() {
            const expression = document.getElementById('display').innerText;
            fetch('calculator.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'expression=' + encodeURIComponent(expression)
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('display').innerText = 'Error';
                } else {
                    document.getElementById('display').innerText = data.result;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('display').innerText = 'Error';
            });
        }
    </script>
</body>
</html>