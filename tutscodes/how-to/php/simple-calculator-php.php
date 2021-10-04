<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

<!-- Calculator Styles -->
<style>

  /* Calculator Container UI */
  .code-matra-calculator-ui {
    font-family: Roboto;
    font-size: 18px;
    color: #666666;
    max-width: 300px;
    box-shadow: 2px 2px 9px 5px #f5f5f5 !important;
    border: 1px solid #f5f5f5;
    margin: 30px auto;
    padding: 20px 20px;
    box-sizing: border-box;
  }

  /* Calculator Header UI */
  .code-matra-calculator-ui .cm-header h3 {
    font-size: 16px;
    background-color: #117CA6;
    text-transform: uppercase;
    color: #ffffff;
    margin: -20px -20px 20px -20px;
    padding: 15px 20px;
    letter-spacing: 1px;
    position: relative;
  }

  .code-matra-calculator-ui .cm-header span {
    font-size: 10px;
  }

  .code-matra-calculator-ui .cm-header span a {
    text-decoration: none;
    color: inherit;
  }

  .code-matra-calculator-ui .cm-header .cm-close {
    right: -14px;
    top: -15px;
    font-size: 16px;
    position: absolute;
    background: #fff;
    border-radius: 100%;
    color: #000;
    width: 30px;
    height: 30px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0px 0px 8px 0px #a8a6a6 !important;
  }

  /* Calculator Field UI */
  .code-matra-calculator-ui .cm-field input{
    width: 100%;
    border: 2px solid #efefef !important;
    margin-bottom: 20px;
    height: 45px;
    font-family: 'Orbitron', sans-serif;
    padding: 5px 10px;
    font-size: 23px;
    letter-spacing: 2px;
    text-align: right;
    outline: unset !important;
    pointer-events: none; 
    cursor: pointer;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none; 
    -ms-user-select: none;
    user-select: none; 
  }

  /* Calculator Body - Buttons UI */
  .code-matra-calculator-ui .cm-row {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .code-matra-calculator-ui .cm-row .btn {
    width: 25%;
    font-family: 'Orbitron', sans-serif;
    border-radius: 0;
    border: 1px solid #efefef;
    font-size: 20px;
    height: 45px;
    background-color: #ffffff;
    color: #666666;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none; 
    -ms-user-select: none;
    user-select: none; 
    cursor: pointer;
  }

  .code-matra-calculator-ui .cm-row .btn:hover {
    background-color: #117CA6;
    border-color: #117CA6;
    color: #ffffff;
  }

  .code-matra-calculator-ui .cm-row .btn.btn-secondary {
    background-color: #f34423;
    border-color: #f34423;
    color: #ffffff;
    width: 50%;
  }

  .code-matra-calculator-ui .cm-row .btn-clear {
    width: 75%;
  }

  /* Site URL */
  .code-matra-calculator-ui .siteurl {
    font-size: 10px;
    margin-top:10px;
    color: #cccccc;
  }

  /* Alerts */
  .code-matra-calculator-ui .cm-danger{
    text-align: center;
    color: #f34423;
    font-size: 12px;
    margin-bottom: 10px; 
    font-weight: normal;
  }
</style>

<?php
// Initial value
$op1 = isset($_REQUEST['operand1']) ? $_REQUEST['operand1'] : '';
$op2 = isset($_REQUEST['operand2']) ? $_REQUEST['operand2'] : '';
$optr = isset($_REQUEST['operator']) ? $_REQUEST['operator'] : '';

//Validation 1: adding operator before operand 1 then clear it.
if (!$op1 && $optr) {
  $optr = '';
}

//Validation 2: If adding dot before operand 1
if (!$op1 && $op2 == '.') {
  $op1 = 0; // add zero prefix 
}

// Validation 3: Check if the last value of field is not operator 
if ($optr) {
  $lastVal = substr($op1, -1);
  $operators = array('+','-','*','/','.');
  if (in_array($lastVal, $operators)) {
    $optr = '';
  }
}

// Validation 4:  Check if that field value is not result of last calculation
if (strpos($op1, '=') === false) {
  $output = $op1.$optr.$op2; 
} else {
  $output = $op2;
}

// If everything fine then calculate the result
if (isset($_REQUEST['result']) && ($_REQUEST['result'] == 1)) {
  $output =  '= ' . eval('return '.$output.';'); 
}

// Clear all values if user clicks on clear button
if (isset($_REQUEST['clear']) && ($_REQUEST['clear'] == 1)) {
  $output = $op1 = $op2 = $optr = '';
}
?>

<!-- Calculator Layout UI Start -->
<form method="post" class="code-matra-calculator-ui" action="">
  <!-- Calculator Header -->
  <div class="cm-header">
    <h3>Calculator <span>using PHP</span></h3>
  </div>

  <?php echo $errorMsg; ?> 

  <!-- Calculator Field -->
  <div class="cm-field">
    <input class="form-control" type="text" readonly name="operand1" value="<?php echo $output; ?>" />
  </div>

  <!-- Calculator Keys -->
  <div class="cm-keys">
      <div class="cm-row">
        <button name="clear" value="1" type="submit" class="btn btn-clear">Clear</button>
        <button name="operator" value="/" type="submit" class="btn">/</button>
      </div>
      <div class="cm-row">
        <button name="operand2" value="7" type="submit" class="btn">7</button>
        <button name="operand2" value="8" type="submit" class="btn">8</button>
        <button name="operand2" value="9" type="submit" class="btn">9</button>
        <button name="operator" value="*" type="submit" class="btn">&times;</button>
      </div>
      <div class="cm-row">
        <button name="operand2" value="4" type="submit" class="btn">4</button>
        <button name="operand2" value="5" type="submit" class="btn">5</button>
        <button name="operand2" value="6" type="submit" class="btn">6</button>
        <button name="operator" value="-" type="submit" class="btn">-</button>
      </div>
      <div class="cm-row">
        <button name="operand2" value="1" type="submit" class="btn">1</button>
        <button name="operand2" value="2" type="submit" class="btn">2</button>
        <button name="operand2" value="3" type="submit" class="btn">3</button>
        <button name="operator" value="+" type="submit" class="btn">+</button>
      </div>
      <div class="cm-row">
        <button name="operand2" value="0" type="submit" class="btn">0</button>
        <button name="operand2" value="." type="submit" class="btn">.</button>
        <button name="result" value="1" type="<?php echo $op2 ? 'submit' : 'button'; ?>" class="btn btn-secondary">=</button>
      </div>
  </div>

  <!-- Site Attributes -->
  <div class="siteurl">https://codematra.com</div>
</form>
<!-- Calculator Layout UI End --> 