<?php
  class Ip extends CI_Model{

    function getIps(){
        $query = $this->db->query("SELECT `ip`.`idip` as idip, `ip`.`ip` as ip, area.nombre as area FROM `ip` LEFT JOIN area ON ip.idarea = area.idarea");
        return $query->result_array();
    }
    
    function getIp($idip){
        $query = $this->db->query("SELECT `ip`.`idip` as idip, `ip`.`ip` as ip, area.nombre as area FROM `ip` LEFT JOIN area ON ip.idarea = area.idarea WHERE idip = $idip");
        $result = $query->result_array();
        return $result[0];  
    }
    
    function saveIp($data){
        $ip = $data['ip'];
        $idarea = $data['idarea'];
        $query = $this->db->query("INSERT INTO ip (ip, idarea) VALUES ( '$ip', $idarea)");
        return $query;
    }
    
    function update($data){
        $id = $data['idip'];
        $ip = $data['ip'];
        $idarea = $data['idarea'];
        $query = $this->db->query("UPDATE ip SET ip='$ip', idarea=$idarea WHERE idip = '$id'");
        return $query;
    }
  }
?>
