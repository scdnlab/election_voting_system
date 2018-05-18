<?php /* Smarty version 2.6.6, created on 2010-10-03 19:41:23
         compiled from voting_page2.tpl */ ?>
        <div class="padding">
            <?php if ($this->_tpl_vars['election']['date'] == $this->_tpl_vars['current_date']): ?>
            <div id="element-box" class="login">
                <div class="t">
                    <div class="t">
                        <div class="t"></div>
                    </div>
                </div>

                <div class="m">

                    <h1>Voter Login</h1>
                    <div id="err_msg_id" style="color:red;font-weight:bold;font-size:12px"></div><br>
                            <div id="section-box">
            <div class="t">
                <div class="t">
                    <div class="t"></div>
                 </div>
             </div>
            <div class="m" >

<form action="voting_page2.php" method="post" name="loginForm" id="loginForm" style="clear: both;">
    <p>
        <label for="reg_no">Registration No</label>
        <input name="login[reg_no]" value="" id="username" type="text" class="inputbox" size="15" value="<?php echo $_REQUEST['login']['reg_no']; ?>
"/>
    </p>

    <p>
        <label for="password">Password</label>

        <input name="login[password]" id="password" type="password" class="inputbox" size="15" value="<?php echo $_REQUEST['login']['passpord']; ?>
"/>
    </p>
        <p>
        <label for="lang"></label>
        </p>
    <div style="padding-left: 180px;">
    <div class="button1-left">

        <div class="next">
            <a onclick="loginForm.submit();">
                Login            </a>
            <input type="submit" style="border: 0; padding: 0; margin: 0; width: 0px; height: 0px;" value="Login" />
        </div>
    </div>
    </div>
</form>
                <div class="clr"></div>
            </div>
            <div class="b">
                <div class="b">
                     <div class="b"></div>

                </div>
            </div>
        </div>

                    <p>Use a valid registration number and password to gain access to the voting page.</p>
                    <p>
                        &nbsp;
                    </p>
                    <div id="lock"></div>

                    <div class="clr"></div>
                </div>
                <div class="b">
                    <div class="b">
                        <div class="b"></div>
                    </div>
                </div>



<?php elseif ($this->_tpl_vars['election']['date'] == ""): ?>
    <h1>Sorry, no new election found</h1>
<?php else: ?>
<table width="100%" height="100" >
    <tr>
        <td colspan="2" align="center">
            <h1><?php echo $this->_tpl_vars['election']['title']; ?>
</h1>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <h2>Election date : <?php echo $this->_tpl_vars['election']['date']; ?>
</h2>
        </td>
    </tr>
<tr>
</table>
<?php endif; ?>
