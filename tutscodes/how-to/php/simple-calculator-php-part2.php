  <?php
  /* 
  * Calculator PHP Example | Site - https://codematra.com/
  */

  // Initial value
  $op1 = isset($_REQUEST['operand1']) ? $_REQUEST['operand1'] : '';
  $op2 = isset($_REQUEST['operand2']) ? $_REQUEST['operand2'] : '';
  $optr = isset($_REQUEST['operator']) ? $_REQUEST['operator'] : '';

  //Validation 1: Stop user to add operator before adding any number or value
  if (!$op1 && $optr) {
    $optr = '';
  }

  //Validation 2: If the user adds a dot then add a prefix zero before the dot
  if (!$op1 && $op2 == '.') {
    $op1 = 0; // add zero prefix 
  }

  // Validation 3: Don't allow to add multiple operators to add continuously. 
  if ($optr) {
    $lastVal = substr($op1, -1);
    $operators = array('+','-','*','/','.');
    if (in_array($lastVal, $operators)) {
      $optr = '';
    }
  }

  // Validation 4:  After the result, Clear the display value with the next input or click.
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
