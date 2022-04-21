.search-toggle {
  position: fixed;
  top: 10px;
  right: 10px;
  z-index: 999;
  color: #117CA6;
  background-color: #ffffff;
  padding: 10px;
  border-radius: 3px;
  border:1px solid #117CA6;
  font-family: Roboto;
  cursor: pointer;
}

.search-codematra {
  background: rgba(0,0,0,0.5);
  z-index: 99;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0; 
  font-family: Roboto;
  display: flex;
  flex-direction: column;
  justify-content: center;
} 

.search-codematra h3 {
  font-size: 24px;
  font-weight: bold;
  text-transform: uppercase;
  text-align: center;
  width: 100%;
  display: block;
  margin: 0 0 20px 0;
  color: #fff;
}

.search-codematra .search {
  position: relative;
  width: 90%;
  max-width: 800px;
  margin: 0 auto;
}

.search-codematra .search input[type="text"] {
  width: 100%;
  padding: 15px;
  font-size: 15px;
  box-sizing: border-box;
  border:none;
}

.search-codematra .search button {
  background: transparent;
  border: none !important;
  position: absolute;
  right: 0;
  top: 0;
  font-size: 18px;
  line-height: 50px;
  padding: 0 15px; 
  cursor: pointer;
  box-shadow: none !important;
  color: #117CA6;
}   