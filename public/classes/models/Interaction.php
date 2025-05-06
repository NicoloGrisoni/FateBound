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
        public $ID;
        public $IDUser;
        public $chapter;
        public $date;

        public function __construct($ID, $IDUser, $IDChapter, $date) {
            //Check if all the value which cannot be null are correctly passed to the fuction
            //Check if all the value have the type expected
            $db = Database::GetInstance();

            $this->ID = $ID;
            $this->IDUser = $IDUser;
            
            $ch = $db->GetChapter($IDChapter);
            if (!is_null($ch)) {
                $this->chapter = $ch;
            } else {
                $this->chapter = "Data not found";
            }
            
            $this->date = $date;
        }
    }
?>