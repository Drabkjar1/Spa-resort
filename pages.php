<?php
class Page{
  public $id;
  public $title;
  public $menu;

  function __construct($id,$title,$menu){
    $this->id=$id;
    $this->title=$title;
    $this->menu=$menu;

  }

    function getContent(){
      return file_get_contents("$this->id.html");

    }
    

  function setContent($content){
    return file_put_contents("$this->id.html",$content);
  }
}

$listPages=[
  "main"=> new Page ("main","Sea Resort","Home"),
  "offer"=> new Page ("offer","Offer-Sea Resort","Offer"),
 "gallery"=> new Page ("gallery","Gallery-Sea Resort","Gallery"),
  "booking"=> new Page ("booking","Booking-Sea Resort","Booking"), 
  "contact"=> new Page ("contact","Contact-Sea Resort","Contact"),
  "404"=>    new Page ("404","Page - not exist",""),
]







?>