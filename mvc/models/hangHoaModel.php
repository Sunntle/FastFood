<?php
class hangHoaModel extends db{
    public function listAllSanPham(){
        $sql = "SELECT * FROM hanghoa";
        return $this->pdo_query($sql);
    }
    public function SelectProductID($id){
        $sql = "SELECT * FROM hanghoa WHERE maHangHoa = ?";
        return $this->pdo_query($sql, $id);
    }
    public function SelectTopSp(){
        $sql = "SELECT * FROM hanghoa ORDER BY luotXem DESC limit 4";
        return $this->pdo_query($sql);
    }
    public function listAllCmt(){
        $sql = "SELECT * FROM binhluan";
        return $this->pdo_query($sql);
    }
    public function DeleteAllByLoai($maLoai){
        $sql = "DELETE FROM hanghoa WHERE maLoai= ?";
        $this->pdo_execute($sql,$maLoai);
    }
    public function SelectSpByTenSp($tenHangHoa){
        $sql = "SELECT * FROM hanghoa WHERE tenHangHoa = ?";
        return $this->pdo_query($sql, $tenHangHoa);
    }
    // public function SelectProductbyIDType($id,$page){
    //     $sql = "SELECT * FROM hanghoa WHERE maLoai = ".$id." LIMIT 0,".$page;
    //     return $this->pdo_query($sql);
    // }
    public function UpdateLuotXem($luotXem,$maHangHoa){
        $sql = "UPDATE hanghoa
        SET luotXem = ?
        WHERE maHangHoa = ?";
        return $this->pdo_execute($sql,$luotXem,$maHangHoa);
    }
    public function UpdateSp($tenHangHoa,$gia,$target_file,$moTa,$maLoai,$soLuong,$maHangHoa){
        $sql = "UPDATE hanghoa
        SET tenHangHoa = ?, gia =?, hinhAnh = ?, moTa =?, maLoai = ?, soLuong = ?
        WHERE maHangHoa = ?";
        return $this->pdo_execute($sql,$tenHangHoa,$gia,$target_file,$moTa,$maLoai,$soLuong,$maHangHoa);
    }
    public function UpdateSpNoImg($tenHangHoa,$gia,$moTa,$maLoai,$soLuong,$maHangHoa){
        $sql = "UPDATE hanghoa
        SET tenHangHoa = ?, gia =?, moTa =?, maLoai = ?, soLuong = ?
        WHERE maHangHoa = ?";
        return $this->pdo_execute($sql,$tenHangHoa,$gia,$moTa,$maLoai,$soLuong,$maHangHoa);
    }
    public function DeleteHangHoa($maHangHoa){
        $sql = "DELETE FROM hanghoa WHERE maHangHoa=?";
        $this->pdo_execute($sql,$maHangHoa);
    }
    public function InsertHangHoa($tenHangHoa,$gia,$hinh,$moTa,$maLoai,$soLuong){
        $sql = "INSERT INTO hanghoa(tenHangHoa,gia,hinhAnh,moTa,maLoai,soLuong) VALUES(?,?,?,?,?,?)";
        return $this->pdo_execute($sql,$tenHangHoa,$gia,$hinh,$moTa,$maLoai,$soLuong);
    }
    public function UpdateCountSp($soLuong,$maHangHoa){
        $sql = "UPDATE hanghoa
        SET soLuong= ?
        WHERE maHangHoa = ?";
        return $this->pdo_execute($sql,$soLuong,$maHangHoa);
    }
    // new
    // public function PhanTrang($keyword,$perPage,$offset){
    //     $sql = "SELECT * FROM hanghoa WHERE tenHangHoa LIKE '%".$keyword."%' ORDER BY maHangHoa asc LIMIT ".$perPage." OFFSET ".$offset ;
    //     $data = $this->pdo_query($sql);
    //     return $data;
    // }
    public function countSP($keyword){
        $sql = "SELECT count(maHangHoa) as dem FROM hanghoa WHERE tenHangHoa LIKE '%". $keyword ."%'";
        $count = $this->pdo_query($sql);
        return $count[0]['dem'];
    }

    public function SelectProductbyIDType($id,$keyword,$page){
        $sql = "SELECT * FROM hanghoa WHERE $id $keyword $page " ;
        return $this->pdo_query($sql);
    }
    public function soLuong(){
        $sql = "SELECT maHangHoa, soLuong FROM hanghoa ";
        return $this->pdo_query($sql);
    }
    public function UpdateQtyHH($qty,$maHH){
        $sql = "UPDATE hanghoa SET soLuong = ? WHERE  maHangHoa = ?";
        return $this->pdo_execute($sql,$qty,$maHH);
    }


}
?>