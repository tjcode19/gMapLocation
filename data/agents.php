<?php 

    class agents(){

        private $id;
        private $name;
        private $address;
        private $lat;
        private $lng;
        private $type;

        function setId($id) { $this->id = $id; }
        function getId() { return $this->id; }
        function setName($name) { $this->name = $name; }
        function getName() { return $this->name; }
        function setAddress($address) { $this->address = $address; }
        function getAddress() { return $this->address; }
        function setLat($lat) { $this->lat = $lat; }
        function getLat() { return $this->lat; }
        function setLng($lng) { $this->lng = $lng; }
        function getLng() { return $this->lng; }
        function setType($type) { $this->type = $type; }
        function getType() { return $this->type; }


        public function __construct(){

        }
    }

?>