<?php
class loaiModel extends db{
    public function listAll(){
        $sql = "SELECT * FROM loai";
        return $this->pdo_query($sql);
    }
    public function SelectLoaiByID($maLoai){
        $sql ="SELECT * FROM loai WHERE maLoai =?";
        return $this->pdo_query($sql,$maLoai);
    }
    public function UpdateLoai($tenLoai,$hinh,$maLoai){
        $sql = "UPDATE loai
        SET tenLoai = ?, hinh = ?
        WHERE maLoai = ?";
        return $this->pdo_execute($sql,$tenLoai,$hinh,$maLoai);
    }
    public function UpdateLoaiNoImg($tenLoai,$maLoai){
        $sql = "UPDATE loai
        SET tenLoai = ?
        WHERE maLoai = ?";
        return $this->pdo_execute($sql,$tenLoai,$maLoai);
    }
    public function DeleteLoai($maLoai){
        $sql = "DELETE FROM loai WHERE maLoai= ?";
        $this->pdo_execute($sql,$maLoai);
    }
    public function SelectLoaiByTenLoai($tenLoai){
        $sql = "SELECT * FROM loai WHERE tenLoai = ?";
        return $this->pdo_query($sql,$tenLoai);
    }
    public function InsertLoai($tenLoai,$hinh){
        $sql = "INSERT INTO loai(tenLoai,hinh) VALUES(?,?)";
        return $this->pdo_execute($sql,$tenLoai,$hinh);
    }
    public function thongke(){
        $sql =" SELECT loai.maLoai , loai.tenLoai , COUNT(hanghoa.maHangHoa) as countsp , MIN(hanghoa.gia) as mingia , MAX(hanghoa.gia) as maxgia , AVG(hanghoa.gia) as avggia ";
        $sql .=" FROM hanghoa LEFT JOIN loai ON loai.maLoai = hanghoa.maLoai ";
        $sql .="GROUP BY loai.maLoai";
        $tk=$this->pdo_query($sql);
        return $tk;
    }
}
?>