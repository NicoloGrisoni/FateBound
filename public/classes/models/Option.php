<?php 
    /**
     * Class Option: 
     *      this class allows to save all the information about an option that appear on the screen when the user interact with a chapter
     * Informations:
     *      1- the description of the option
     *      2- the chapter on which the option needs to be displayed
     *      3- the chapter to be displayed afterward, depending on whether the user decides to interact with this option
     */

    class Option {
        public $ID;
        public $description;
        public $IDCurrentChapter;
        public $IDNextChapter;

        public function __construct($ID, $description, $IDCurrentChapter, $IDNextChapter) {
            //Check if all the value which cannot be null are correctly passed to the fuction
            //Check if all the value have the type expected
            $this->ID = $ID;
            $this->description = $description;
            $this->IDCurrentChapter = $IDCurrentChapter;
            $this->IDNextChapter = $IDNextChapter;
        }
    }
?>