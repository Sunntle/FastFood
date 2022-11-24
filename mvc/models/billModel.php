<?php
class billModel extends db{

        public function CreateCart($use,$maHH,$hinhAnh,$ten,$gia,$sl,$tt,$last){
            $sql = "INSERT INTO giohang (maKH,maHangHoa,hinhHangHoa,tenHangHoa,gia,soLuong,thanhTien,idBill)  VALUES (?,?,?,?,?,?,?,?)";
            return $this->pdo_execute($sql,$use,$maHH,$hinhAnh,$ten,$gia,$sl,$tt,$last);
            
        }

        public function CreateBill($name,$use,$dc,$sdt,$email,$pttt,$ngay,$sumqty,$tt){
            $sql = "INSERT INTO bill (name,maKH, diaChi,sdt,email,pttt,ngay,sl,total)  VALUES (?,?,?,?,?,?,?,?,?)";
            return $this->pdo_query_id($sql,$name,$use,$dc,$sdt,$email,$pttt,$ngay,$sumqty,$tt);
        }
        
        public function ShowBill($last){
            $sql = "SELECT * FROM bill where id= $last";
            return $this->pdo_query($sql);
        }
        public function SelectBillByMaKH($MaKH){
            $sql = "SELECT * FROM bill where maKH=?";
            return $this->pdo_query($sql,$MaKH);
        }
        public function count($get){
            $sql = "SELECT SUM(soLuong) as dem FROM giohang where idBill= '$get'";
            $row = $this->pdo_query($sql);
            return $row[0]['dem']; 
        }
        public function CountAllBill(){
            $sql = "SELECT count(id) as dem FROM bill ";
            $row = $this->pdo_query($sql);
            return $row[0]['dem'];
        }
        public function ShowAllBill(){
            $sql = "SELECT * FROM bill ORDER BY status ASC , id DESC";
            return $this->pdo_query($sql);
        }
        public function dellIdCart($id){
            $sql = " DELETE FROM giohang WHERE idBill = ? ";
            return $this->pdo_execute($sql,$id);
        }
        public function dellIdBill($id){
            $sql = " DELETE FROM bill WHERE id = ? ";
            return $this->pdo_execute($sql,$id);
        }
        public function ShowID($id){
            $sql = "SELECT * FROM bill where id= $id";
            return $this->pdo_query($sql);
        }
        public function UpdateBill($status,$n){
                $sql = "UPDATE bill SET status = ? WHERE id = ?";
                return $this->pdo_execute($sql,$status,$n);
        }
        public function DeleteBillByMaKH($MaKH){
            $sql = "DELETE FROM bill WHERE MaKH= ?";
            return $this->pdo_execute($sql,$MaKH);
        }
        public function SelectBillByStatus($u){
            $sql = "SELECT * FROM bill WHERE maKH = ? ORDER BY status ASC, id DESC ";
            return $this->pdo_query($sql,$u);
        }
        public function QtyCart($qty){
            $sql = "SELECT maHangHoa, soLuong, idBill FROM giohang Where idBill = ?";
            return $this->pdo_query($sql,$qty);
        }
        public function demsldonhang($m){
            $sql ="SELECT maKH, COUNT(maKH) as sl FROM bill WHERE status BETWEEN 0 AND 1 AND maKH = ? AND unBill BETWEEN 0 AND 1";
            $data= $this->pdo_query($sql,$m);
            return $data[0];
        }
        public function SeIdCart($a){
            $sql = "SELECT * FROM giohang WHERE idBill=? ";
            return $this->pdo_query($sql,$a);
        }
        public function thongkedonhang(){
            $sql = "SELECT MONTH(ngay) as thang , sum(total) as tong FROM bill WHERE status = 2 GROUP BY MONTH(ngay) ";
            return $this->pdo_query($sql);
        }
        public function thongkedonhangtheongay($thang){
            $sql = "SELECT DAY(ngay)as ngay, MONTH(ngay) as thang, sum(total) as tong FROM bill WHERE status = 2 GROUP BY ngay HAVING MONTH(ngay) =? ";
            return $this->pdo_query($sql,$thang);
        }
        public function updateHuyBill($u,$i){
            $sql = "UPDATE bill SET unBill = ? WHERE id = ? ";
            return $this->pdo_execute($sql,$u,$i);
        }
        public function PhanTrang($perPage,$offset){
            $sql = "SELECT * FROM bill ORDER BY status ASC, id DESC LIMIT ".$perPage." OFFSET ".$offset ;
            $data = $this->pdo_query($sql);
            return $data;
        }
    }
?>