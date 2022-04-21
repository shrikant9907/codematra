/*Popup UI CSS Start*/
.codematra-popup-ui .popup-mask,
.codematra-popup-ui {
  font-family: Roboto;
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 999999;
}

.codematra-popup-ui .popup-mask {
  position: absolute !important;
  background: rgba(0, 0, 0, 0.3);
  display: flex;
  justify-content: center;
  align-items: center;
}

.codematra-popup-ui .popup-box {
  background: #ffffff;
  width: 400px;
  max-width: 90%;
  display: block;
  margin: 0 auto;    
  padding: 40px 25px;
  position: relative;
  border-radius: 10px;
  box-shadow: 2px 2px 9px 5px rgba(0,0,0,0.05);
}

.codematra-popup-ui .popup-box h3 {
  margin-bottom: 20px;
  margin-top: 0px;
}

.codematra-popup-ui .popup-box p {
  margin-bottom: 30px;
}

.codematra-popup-ui .popup-box .popup-close {
  position: absolute;
  right: 0px;
  top: 0px;
  width: 40px;
  line-height: 40px;
  text-align: center;
  cursor: pointer;
  font-size: 24px;
  font-weight: bold;
}

.codematra-popup-ui .popup-actions {
  text-align: center;
}

.codematra-popup-ui .popup-actions .popup-btn {
  padding: 10px 20px;
  background-color: #117CA6;
  text-decoration: none;
  color: #ffffff;
  margin: 0 5px;
  text-transform: uppercase;
  border-radius: 4px;
}
/*Popup UI CSS End*/