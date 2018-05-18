<?php /* Smarty version 2.6.6, created on 2008-03-23 11:34:11
         compiled from admin/admin.tpl */ ?>
<table cellpadding ="0" cellspacing="0" border="0" width="100%">
        <tr height="110">
                <td align="center" valign="top">
                        <form method="post" action="admin.php">
                        <table cellpadding ="0" cellspacing="5" border="0" width="98%" style = "border:#efefef 1px solid">
                                <tr>
                                        <td colspan="2">
                                                <b>Edit Admin Settings</b>
                                        </td>
                                </tr>
                                <tr>
                                        <td colspan="2">
                                                &nbsp;
                                        </td>
                                </tr>

                                <tr>
                                        <td width="25%">
                                                <b>Admin Username :</b>
                                        </td>
                                        <td>
                                                <input type="text" name="admin[username]" value="<?php echo $this->_tpl_vars['admin']['username']; ?>
" size="35">
                                        </td>
                                </tr>

                                <tr>
                                        <td width="25%">
                                                <b>Admin Password :</b>
                                        </td>
                                        <td>
                                                <input type="password" name="admin[password]" value="<?php echo $this->_tpl_vars['admin']['password']; ?>
" size="35">
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                        </td>
                                        <td>
                                                <input type="submit" name="submit" value="Update">
                                        </td>
                                </tr>
                        </table>
                        </form>
                </td>
        </tr>
        

</table>
