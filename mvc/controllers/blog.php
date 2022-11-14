<?php
class blog extends controller{
    function SayHi(){
        $this->view(
            "layout",
            [
            "Pages"=>"blog",
            ],
        );
    }
}

?>