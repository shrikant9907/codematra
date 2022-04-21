/* Calculator Container UI - https://codematra.com/*/
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
}

.code-matra-calculator-ui .cm-row .btn.btn-clear {
  width: 75%;
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
  width:50%;
}

/* Site URL */
.code-matra-calculator-ui .siteurl {
  font-size: 10px;
  color: #cccccc;
  margin-top: 20px;
}