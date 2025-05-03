<?php
    /**
     * Class Category: 
     *      this class allows to save all the information about a category
     * Informations:
     *      1- the name of this category
     *      2- the description of this category
     */

    class Category {
        private $ID;
        private $name;
        private $description;

        public function __construct($ID, $name, $description) {
            //Check if all the value which cannot be null are correctly passed to the fuction
            //Check if all the value have the type expected
            $this->ID = $ID;
            $this->name = $name;
            $this->description = $description;
        }
    }
?>