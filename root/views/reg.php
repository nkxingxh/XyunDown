<style>
body,h1,h2,h3,h4,h5,h6,hr,p,blockquote,dl,dt,dd,ul,ol,li,pre,form,fieldset,legend,button,input,textarea,th,td {
margin:0;
padding:0;
}

body,button,input,select,textarea {
font:12px/1.5 tahoma,arial,\5b8b\4f53,sans-serif;
text-align:justify;
text-justify:inter-ideograph;
word-break:break-all;
word-wrap:break-word;
}

h1,h2,h3,h4,h5,h6 {
font-size:100%;
}

address,cite,dfn,em,var,i,u {
font-style:normal;
}
code,kbd,pre,samp {
font-family:courier new,courier,monospace;
}

small {
font-size:12px;
}

ul,ol {
list-style:none;
}

sup {
vertical-align:text-top;
}

sub {
vertical-align:text-bottom;
}

legend {
color:#000;
}

fieldset,img {
border:0;
}

button,input,select,textarea {
font-size:100%;
margin:0;
padding:0;
}

table {
border-collapse:collapse;
border-spacing:0;
}

caption,th {
text-align:left;
}

.ovh {
overflow:hidden;
}

.l {
float:left;
}

.r {
float:right;
}

.cur {
cursor:pointer;
}

.c_b {
content:".";
display:block;
height:0;
clear:both;
zoom:1;
font-size:0;
overflow:hidden;
visibility:hidden;
}

.c_b2 {
clear:both;
}

.dn {
display:none;
}

.dis {
display:block;
}

.b {
font-weight:700;
}

body {
behavior:url(css/hover_htc.htc);
font-family:"Microsoft YaHei",宋体;
color:#333;
}

.login ul {
padding-top:10px;
border-top:1px solid #fff;
}

.login ul a {
color:#005cb1;
}

.login .id input,.login .pw input,.in_id,.in_mo,.reg_input,.reg_input_pic {
background-color:#FFF;
border:1px solid #d5cfc2;
font-size:14px;
font-weight:700;
vertical-align:middle;
}

.login .id input,.login .pw input {
width:170px;
height:30px;
line-height:30px;
margin:0 5px 5px 0;
padding:0 5px;
}

.login .id input:hover,.login .pw input:hover,.in_id:hover,.in_mo:hover,.reg_input:hover,.reg_input_pic:hover {
border:1px solid #005cb1;
background-color:#F2FAFF;
}

.l_button,.r_button {
background:url(images/login_button.png) no-repeat;
width:118px;
height:39px;
border:none;
cursor:pointer;
display:block;
float:left;
text-indent:-9000px;
}

.l_button {
background-position:0 -60px;
}

.r_button {
background-position:-138px -60px;
margin-right:4px;
}

.r_button:hover {
background-position:-138px 0;
}

.f_reg_but {
margin:10px 0 0 115px;
}

.reg {
width:460px;
font-size:14px;
line-height:25px;
overflow:hidden;
}

.reg dl {
padding-left:10px;
font-size:14px;
}

.reg dl dd {
padding:3px 0;
}

.reg .title {
width:100px;
display:inline-block;
text-align:right;
padding-right:10px;
}

.reg_input_pic {
width:80px;
}

.in_pic_s {
margin-left:83px;
}

.reg .img {
position:absolute;
}

.onShow,.onFocus,.onError,.onCorrect,.onLoad {
background:url(images/reg_bg.png) no-repeat 3000px 3000px;
padding-left:30px;
font-size:12px;
height:25px;
width:124px;
display:inline-block;
line-height:25px;
vertical-align:middle;
overflow:hidden;
margin-left:6px;
}

.onShow {
color:#999;
padding-left:0;
}

.onFocus {
background-position:0 -30px;
color:#333;
}

.onError {
background-position:0 -60px;
color:#333;
}

.onCorrect {
background-position:0 0;
text-indent:-9000px;
}

.reg_m {
margin-left:90px;
}

.clew_txt {
display:inline-block;
font-size:12px;
padding:7px 0 0 15px;
}

.id input,.pw input,.in_id,.in_mo,.reg_input,.reg_input_pic {
_behavior:url(js/Round_htc.htc);
-moz-border-radius:4px;
-webkit-border-radius:4px;
border-radius:4px;
height:25px;
}

.user_button a,.pay_but {
_behavior:url(js/Round_htc.htc);
-moz-border-radius:100px;
-webkit-border-radius:100px;
border-radius:100px;
}

#one1,#one2 {
display:block;
background-color:#e9eed8;
text-align:center;
clear:both;
cursor:pointer;
padding:5px 0;
}

#one1:hover,#one2:hover {
background-color:#d4dfb0;
}

#one1 span,#one2 span {
color:red;
}

.l_button:hover,.onLoad {
background-position:0 0;
}

.reg dl dt,#one2 {
margin-top:15px;
}

#tips{
float:left;
margin:2px 0 0 110px;
}
#tips span {
float:left;
width:40px;
height:20px;
color:#fff;
overflow:hidden;
background:#ccc;
margin-right:2px;
line-height:20px;
text-align:center;
}
#tips.s1 .active{background:#f30;}
#tips.s2 .active{background:#fc0;}
#tips.s3 .active{background:#cc0;}
#tips.s4 .active{background:#090;}
</style>
<script type="text/javascript">
//用户名
function UserNameStart() {
	var show = document.getElementById('t_UserNameTip');
	show.className = "onFocus";
	show.innerHTML = "5-12个字符"
}
function CheckUserName( value ){
	var show = document.getElementById('t_UserNameTip');
	var reg = new RegExp("^\\w+$");
	if( value.length < 5 ) {
		show.className = "onError";
		show.innerHTML = "用户名长度错误";
		return false;
	} else {
		if( reg.test(value) ) {
			show.className = "onCorrect";
			return true;
		} else {
			show.className = "onError";
			show.innerHTML = "用户名格式不正确";
			return false;
		}
	}
}
//昵称
function UickNameStart() {
	var show = document.getElementById('iptNickNameTip');
	show.className = "onFocus";
	show.innerHTML = "2-6个中文字符"
}
function CheckUickName( value ){
	var show = document.getElementById('iptNickNameTip');
	var reg = new RegExp("^[\\u4E00-\\u9FA5\\uF900-\\uFA2D]+$");
	if( value.length < 2 ) {
		show.className = "onError";
		show.innerHTML = "昵称长度错误";
		return false;
	} else {
		if( reg.test(value) ) {
			show.className = "onCorrect";
			return true;
		} else {
			show.className = "onError";
			show.innerHTML = "昵称格式不正确";
			return false;
		}
	}
}
//密码
function PassWordStart()
{
	var show = document.getElementById('pswordTip');
	show.className = "onFocus";
	show.innerHTML = "6-16位的字母数字字符"
}
window.onload = function ()
{
 	var oTips = document.getElementById("tips");
 	var oInput = document.getElementsByTagName("input")[2];
 	var aSpan = oTips.getElementsByTagName("span");
 	var show = document.getElementById('pswordTip');
 	var aStr = ["弱", "中", "强", "非常好"];
 	var i = 0; 
 
 	oInput.onkeyup = oInput.onblur = function ()
 	{
  		var index = checkStrong(this.value);
  		if( index == 0) {
  			show.className = "onError";
			show.innerHTML = "密码长度错误";
  		} else {
  			show.className = "onCorrect";
  		}
  		oTips.className = "s" + index;
  		for (i = 0; i < aSpan.length; i++)aSpan[i].className = aSpan[i].innerHTML = "";
  		index && (aSpan[index - 1].className = "active", aSpan[index - 1].innerHTML = aStr[index - 1])
 	}
}
/** 强度规则
 + ------------------------------------------------------- +
 1) 任何少于6个字符的组合，弱；任何字符数的同类字符组合，弱；
 2) 任何字符数的两类字符组合，中；
 3) 12位字符数以下的三类或四类字符组合，强；
 4) 12位字符数以上的三类或四类字符组合，非常好。
 + ------------------------------------------------------- +
**/
//检测密码强度
function checkStrong(sValue)
{
 	var modes = 0;
 	if (sValue.length < 6) return modes;
 	if (/\d/.test(sValue)) modes++; //数字
 	if (/[a-z]/.test(sValue)) modes++; //小写
 	if (/[A-Z]/.test(sValue)) modes++; //大写  
 	if (/\W/.test(sValue)) modes++; //特殊字符
 	switch (modes)
 	{
  		case 1:
   			return 1;
   			break;
  		case 2:
   			return 2;
  		case 3:
  		case 4:
   			return sValue.length < 12 ? 3 : 4
   			break;
 	}
}
//重复密码
function CheckRePassWord( value )
{
	var show = document.getElementById("t_RePassTip");
	var passwd = document.getElementById("t_UserPass");
	var passwdstr = passwd.value;
	if( passwdstr == value )
	{
		show.className = "onCorrect";
		return true;
	} 
	else
	{
		show.className = "onError";
		show.innerHTML = "两次输入的密码不一致";
		return false;
	}
}
//QQ
function QQStart() {
	var show = document.getElementById('iptCardTip');
	show.className = "onFocus";
	show.innerHTML = "5-11位的数字"
}
function CheckQQ( value ){
	var show = document.getElementById('iptCardTip');
	var reg = new RegExp("^[1-9]*[1-9][0-9]*$");
	if( value.length < 5 ) {
		show.className = "onError";
		show.innerHTML = "QQ号码长度错误";
		return false;
	} else {
		if( reg.test(value) ) {
			show.className = "onCorrect";
			return true;
		} else {
			show.className = "onError";
			show.innerHTML = "QQ号码格式不正确";
			return false;
		}
	}
}
//email
function EmailStart() {
	var show = document.getElementById('t_EmailTip');
	show.className = "onFocus";
	show.innerHTML = "请输入你的EMAIL地址"
}
function CheckEmail( value ){
	var show = document.getElementById('t_EmailTip');
	var reg = new RegExp("^\\w+((-\\w+)|(\\.\\w+))*\\@[A-Za-z0-9]+((\\.|-)[A-Za-z0-9]+)*\\.[A-Za-z0-9]+$");
	if( value.length < 6 ) {
		show.className = "onError";
		show.innerHTML = "EMAIL地址不得少于6位";
		return false;
	} else {
		if( reg.test(value) ) {
			show.className = "onCorrect";
			return true;
		} else {
			show.className = "onError";
			show.innerHTML = "EMAIL地址格式不正确";
			return false;
		}
	}
}
function CheckLast(thisform)
{
	var username = document.getElementById('t_UserName');
	var uickname = document.getElementById('iptNickName');
	var password = document.getElementById('t_UserPass');
	var repsword = document.getElementById('t_RePass');
	var qqcard   = document.getElementById('iptCard');
	var emailadd = document.getElementById('t_Email');

	if( !CheckUserName( username.value ) ) {
		return false;
	}
	if( !CheckUickName( uickname.value ) ) {
		return false;
	}
	if( password.value.length < 6)
	{
		return false;
	}
	if( !CheckRePassWord( repsword.value ) ) {
		return false;
	}
	if( !CheckQQ( qqcard.value ) ) {
		return false;
	}
	if( !CheckEmail( emailadd.value ) ) {
		return false;
	}

	return true;
	
}
</script>
<div class="container">       
<div class="hero-unit">
    <div class="reg">
        <form action="<?php echo base_url()."reg/do_reg"; ?>" method="post" name="form1" id="form1" onsubmit="return CheckLast(this);">
            <dl>
                <dt class="f14 b">帐户基本信息</dt>
                <dd><span class="title">登录账号：</span><input class="reg_input" name="t_UserName" id="t_UserName" onblur="CheckUserName(this.value);" onfocus="UserNameStart();" type="text" maxlength="12"/><span id="t_UserNameTip" class="onshow"></span></dd>
                <dd><span class="title">昵称：</span><input class="reg_input" name="iptNickName" id="iptNickName" onblur="CheckUickName(this.value)" onfocus="UickNameStart();" type="text" maxlength="6"/><span id="iptNickNameTip" class="onshow"></span></dd>
				<dd></dd>
            </dl>
            <dl>
                <dt class="f14 b">帐户安全设置</dt>
                <dd><span class="title">登录密码：</span><input class="reg_input" onchange="CheckPassWord();" onfocus="PassWordStart();" id="t_UserPass" name="t_UserPass" type="password" maxlength="16"/><span id="pswordTip" class="onshow"></span></dd>
				<div id="tips"><span></span><span></span><span></span><span></span></div><br />
                <dd><span class="title">确认登录密码：</span><input onblur="CheckRePassWord(this.value);" class="reg_input" type="password" id="t_RePass" name="t_RePass"/><span id="t_RePassTip" class="onshow"></span></dd>
                <dd><span class="title">QQ 号码：</span><input class="reg_input" name='iptCard' type='text' id='iptCard' onblur="CheckQQ(this.value);" maxlength="11" onfocus="QQStart();"/><span id="iptCardTip" class="onshow"></span></dd>
                <dd><span class="title">邮箱地址：</span><input class="reg_input" name="t_Email" type="text" id="t_Email" onblur="CheckEmail(this.value)" onfocus="EmailStart();"/><span id="t_EmailTip" class="onshow"></span></dd>
            </dl>
            <div class="f_reg_but"><input id="button" name="reg" onclick="CheckLast();" type="submit" value="免费注册" class="r_button"/></div>
        </form>                              
    </div>
</div>
</div>