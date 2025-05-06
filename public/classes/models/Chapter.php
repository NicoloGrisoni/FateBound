<?php 
    /**
     * Class Chapter: 
     *      this class allows to save all the information about a chapter of a story
     * Informations:
     *      1- the story this chapter belongs to
     *      2- the title of this chapter
     *      3- the description of the chapter
     *      4- a flag which indicate whether this chapter is a final chapter or not
     */

    class Chapter {
        public $ID;
        public $IDStory;
        public $title;
        public $description;
        public $isFinal;

        public function __construct($ID, $IDStory, $title, $description, $isFinal) {
            //Check if all the value which cannot be null are correctly passed to the fuction
            //Check if all the value have the type expected
            $db = Database::GetInstance();

            $this->ID = $ID;
            $this->IDStory = $IDStory;
            $this->title = $title;
            $this->description = $description;
            $this->isFinal = $isFinal;
        }
    }
?>