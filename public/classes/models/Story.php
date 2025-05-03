<?php 
    /**
     * Class Story: 
     *      this class allows to save all the information about a story
     * Informations:
     *      1- the title of this story
     *      2- the description of this story
     *      3- the category to which this story belongs
     */

    class Story {
        private $ID;
        private $title;
        private $description;
        private $IDCategory;

        public function __construct($ID, $title, $description, $IDCategory) {
            $this->ID = $ID;
            $this->title = $title;
            $this->description = $description;
            $this->IDCategory = $IDCategory;
        }
    }
?>