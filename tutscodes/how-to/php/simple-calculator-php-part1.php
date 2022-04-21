  <!-- Calculator PHP HTML Layout Example | Site - https://codematra.com/ -->

  <!-- Calculator Layout UI Start -->
  <form method="post" class="code-matra-calculator-ui" action="">
    <!-- Calculator Header -->
    <div class="cm-header">
      <h3>DEMO Calculator <span>using PHP</span></h3>
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