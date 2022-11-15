<?php
class binhLuanModel extends db{
    public function listAll(){
        $sql = "SELECT * FROM binhluan";
        return $this->pdo_query($sql);
    }
    public function SelectCmtbyID($id){
        $sql = "SELECT * FROM binhluan WHERE maHangHoa = ?";
        return $this->pdo_query($sql,$id);
    }
    public function SelectBLByGroup(){
        $sql = "SELECT *,count(maHangHoa) FROM binhluan GROUP BY maHangHoa";
        return $this->pdo_query($sql);
    }
    public function SelectNgayBLMoiNhat($maHangHoa){
        $sql = "SELECT max(ngayBL) FROM binhluan WHERE maHangHoa = ?";
        return $this->pdo_query($sql,$maHangHoa);
    }
    public function SelectNgayBLCuNhat($maHangHoa){
        $sql = "SELECT min(ngayBL) FROM binhluan WHERE maHangHoa = ?";
        return $this->pdo_query($sql,$maHangHoa);
    }
    public function SelectBLByMaHH($maHangHoa){
        $sql ="SELECT* FROM binhluan WHERE maHangHoa = ?";
        return $this->pdo_query($sql,$maHangHoa);
    } 
    public function DeleteBL($maBL){
        $sql = "DELETE FROM binhluan WHERE maBL=?";
        $this->pdo_execute($sql,$maBL);
    }
    public function DeleteBLByMaKH($maKH){
        $sql = "DELETE FROM binhluan WHERE maKH=?";
        $this->pdo_execute($sql,$maKH);
    }
}
?>