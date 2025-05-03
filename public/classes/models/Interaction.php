<?php 
    /**
     * Class Interaction: 
     *      this class allows to save all the information about a user interaction with a specific chapter of a story
     * Informations:
     *      1- the user which has done the interaction
     *      2- the chapter the user has interacted with
     *      3- the date on which the interaction has been done
     */

    class Interaction {
        private $ID;
        private $IDUser;
        private $IDChapter;
        private $date;

        public function __construct($ID, $IDUser, $IDChapter, $date) {
            //Check if all the value which cannot be null are correctly passed to the fuction
            //Check if all the value have the type expected
            $this->ID = $ID;
            $this->IDUser = $IDUser;
            $this->IDChapter = $IDChapter;
            $this->date = $date;
        }
    }
?>