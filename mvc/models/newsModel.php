<?php
class newsModel extends db{
    public function SelectAllNews(){
        $sql =  "SELECT * FROM tintuc ";
        return $this->pdo_query($sql);
    }
    public function SelectTopNews(){
        $sql = "SELECT * FROM tintuc ORDER BY ngay DESC limit 4";
        return $this->pdo_query($sql);
    }
    public function SelectAllNewsPT($page){
        $sql =  "SELECT * FROM tintuc LIMIT 0,$page";
        return $this->pdo_query($sql);
    }
    public function SelectNewsID($id){
        $sql =  "SELECT * FROM tintuc WHERE id = ?";
        return $this->pdo_query($sql,$id);
    }
    public function UpdateNews($tennews,$ngaynews,$ndnews,$hinhtdnews,$id){
        $sql = "UPDATE tintuc SET tieuDe = ?, ngay = ?, noiDung = ?, anhtieude = ? WHERE id =? ";
        return $this->pdo_execute($sql,$tennews,$ngaynews,$ndnews,$hinhtdnews,$id);
    }
    public function UpdateNewsNoImg($tennews,$ngaynews,$ndnews,$id){
        $sql = "UPDATE tintuc SET tieuDe = ?, ngay= ?, noiDung= ? WHERE id =? ";
        return $this->pdo_execute($sql,$tennews,$ngaynews,$ndnews,$id);
    }
    public function RemoveNews($id){
        $sql = "DELETE FROM tintuc WHERE id = ?";
        return $this->pdo_execute($sql,$id);
    }
    public function SelectNewsByName($tennews){
        $sql =  "SELECT * FROM tintuc WHERE tieuDe = ?";
        return $this->pdo_query($sql,$tennews);
    }
    public function InsertNews($tennews,$ngaynews,$ndnews,$hinhtdnews){
        $sql = "INSERT INTO tintuc ( tieuDe, ngay, noiDung, anhtieude) VALUES (?,?,?,?)";
        return $this->pdo_execute($sql,$tennews,$ngaynews,$ndnews,$hinhtdnews);
    }
}
?>