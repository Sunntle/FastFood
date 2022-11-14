<?php
class contact extends controller{
    function SayHi(){
        $this->view(
            "layout",
            [
            "Pages"=>"contact",
            ],
        );
    }
}

?>