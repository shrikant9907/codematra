* {
  outline: none;
  box-sizing: border-box;
}

body {
  font-family: 'Roboto', sans-serif;
}

.container { 
  max-width: 1200px;
  width: 100%;
  margin: 0 auto;
}

.img_class {
  max-width: 100%; 
  height: auto;
} 

.header-codematra {
  position: fixed;
  top: 0px;
  width: 100%;
  background: #fff;
  left: 0;
  right: 0;
  line-height: 0;
}

.header-codematra .top_bar {
  background: #117CA6;
  color: #fff;
  display: inline-block;
  width: 100%;
}

.header-codematra .top_bar .left_part {
  float: left;
  width: 50%;
}

.header-codematra .tcontact a {
  color: #ffffff !important;
  font-size: 14px;
  line-height: 18px;
  padding: 11px 0;
  display: inline-block;
  margin-left: 10px;
  text-align: left;
  text-decoration: none;
}

.header-codematra .tcontact a:first-child {
  margin-left: 0px;
}

.header-codematra .tcontact a svg.fa-phone,
.header-codematra .tcontact a i.fa-phone {
  transform: rotate(100deg);
  font-size: 15px;
  top: 0px;
}

.header-codematra .tcontact a svg,
.header-codematra .tcontact a i {
  font-size: 18px;
  margin-top: -5px;
  position: relative;
  top: 2px;
  margin-right: 5px;
}

.header-codematra .tsocial {
  float: right;
}

.header-codematra .tsocial a {
  color: #ffffff !important;
  text-decoration: none;
  font-size: 16px;
  text-align: center;
  display: inline-block;
  margin: 8px 0 8px 20px;
  line-height: 23px;
  width: 25px;
}

.header-codematra .tsocial a:hover {
  color: #117CA6;
}

.header-codematra .tsocial a:first-child {
  margin-left: 0px;
}

.header-codematra .top_bar .right_part {
  float: left;
  width: 50%;
}

/*Middle Part*/
/*Search Form*/
.header-codematra .hmiddle_part form {
  width: 100%;
  float: right;
  max-width: 400px;
  margin: 22px 0;
  position: relative;
}

.header-codematra .hmiddle_part form label {
  display:none;
}

.header-codematra .hmiddle_part form input {
  width: 100%;
  padding: 10px;
  border: 1px solid #117CA6;
  border-radius: 4px;
  box-sizing: border-box;
}

.header-codematra .hmiddle_part form button.form_button {
  position: absolute;
  right: 2px;
  top: 0;
  border: none;
  color: #117CA6;
  padding: 11px;
  background: transparent;
  cursor: pointer;
}

/*Bottom Part*/
.header-codematra .bottom_menus {
  line-height: 0;
  clear: both;
  width: 100%;
  display: inline-block;
  background: #117CA6;
}
  
.header-codematra .logo-wr {
  padding: 10px 0;
  float: left;
  width: 20%;
}

.header-codematra .logo-wr img {
  max-width: 200px;
}

.header-codematra .logo-wr a {
  display: inline-block;
  text-decoration: none;
  color: #000000;
  line-height: 1;
}

.header-codematra .logo-text {
  font-size: 30px;
  font-weight: bold;
  padding: 15px 0;
  text-transform: uppercase;
  display: block;
}

.header-codematra .main_menu_wr {
  width: 100%;
  text-align: left;
}

.header-codematra .main_menu_wr ul.main_menu {
  padding: 0;
  margin: 0;
  display: flex;
}

.header-codematra .main_menu_wr ul.main_menu li.menu_item {
  display: inline-flex;
  border-right: 1px solid rgba(255,255,255,0.5);
}

.header-codematra .main_menu_wr ul.main_menu li.menu_item:first-child {
  border-left: 1px solid rgba(255,255,255,0.5);
}

.header-codematra .main_menu_wr ul.main_menu .menu_item a {
  color: #ffffff !important;
  font-size: 14px;
  padding: 15px 25px;
  line-height: 14px;
  text-decoration: none;
  width: 100%;
}

.header-codematra .menu_item:hover a,
.header-codematra .menu_item.active a {
  color: #117CA6 !important;
}


.header-codematra .main_menu_wr ul.main_menu .menu_item a.btn_primary {
  background: #117CA6;
  border: none !important;
  border-radius: 0px;
  font-size: 14px;
  font-weight: 500;
  padding: 8px 20px;
  line-height: 20px;
  margin: 15px 0;
  color:#ffffff !important;
} 