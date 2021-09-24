.header-codematra {
  font-family: 'Roboto', sans-serif;
  position: fixed;
  top: 0px;
  width: 100%;
  background: #fff;
  left: 0;
  right: 0;
  line-height: 0;
}

.header-codematra .container {
  max-width: 1200px;
  width: 100%;
  margin: 0 auto;
}

.header-codematra .img_class {
  max-width: 100%; 
  height: auto;
} 

.header-codematra .top_social_links {
  float: left;
  width: 33%;
  margin: 29px 0;
}    

.header-codematra .top_social_links a {
  text-decoration: none;
  font-size: 16px;
  text-align: left;
  display: inline-block;
  margin: 0;
  line-height: 23px;
  width: 34px;
  color:#117CA6;
}

.header-codematra .top_social_links a:hover {
  color: #117CA6;
}

.header-codematra .top_social_links a:first-child {
  margin-left: 0px;
}

.header-codematra .top_bar .right_part {
  float: left;
  width: 50%;
}

/*Middle Part*/
/*Search Form*/
.header-codematra .middle_menus form {
  width: 40px;
  float: right;
  max-width: 400px;
  margin: 22px 0;
  position: relative;
}

.header-codematra .middle_menus form label {
  display:none;
}

.header-codematra .middle_menus form input {
  width: 100%;
  padding: 10px;
  border: 1px solid #117CA6;
  border-radius: 4px;
  box-sizing: border-box;
  visibility: hidden;
}

.header-codematra .middle_menus form:hover {
  width: 100%;
}

.header-codematra .middle_menus form:hover input{
  visibility:visible; 
}

.header-codematra .middle_menus form button.form_button {
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
  
.header-codematra .logo_wr {
  padding: 10px 0;
  float: left;
  width: 33%;
}

.header-codematra .logo_wr img {
  max-width: 200px;
}

.header-codematra .logo_wr a {
  display: inline-block;
}

.header-codematra .logo_wr a.logo_text {
  font-size: 40px;
  text-decoration: none;
  display: inline-block;
  width: 100%;
  line-height: 60px;
  font-weight: bold;
  text-align: center;
  color:#117CA6;
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
  min-width: 107px;
  text-align: center;
}

.header-codematra .main_menu_wr ul.main_menu li.menu_item:first-child {
  border-left: 1px solid rgba(255,255,255,0.5);
}

.header-codematra .main_menu_wr ul.main_menu .menu_item a {
  color: #ffffff !important;
  font-size: 14px;
  padding: 14px 25px;
  line-height: 14px;
  text-decoration: none;
  width: 100%;
  font-weight: bold;
  text-transform: capitalize;
}

.header-codematra .menu_item:hover a,
.header-codematra .menu_item.active a {
  color: #282782 !important;
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

.header-codematra .main_menu_wr ul.main_menu .menu_item a.btn_primary:hover {
  box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.2);
}