<?php
defined('BASEPATH') or exit('No direct script access allowed');
class menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $querymenu = "SELECT `tb_submenu`.*, `tb_menu`.`NAMA_MENU` 
                        FROM `tb_submenu` JOIN `tb_menu` 
                        ON `tb_submenu`.`MENU_ID`=`tb_menu`.`ID_MENU`";
        return $this->db->query($querymenu)->result_array();
    }
}
