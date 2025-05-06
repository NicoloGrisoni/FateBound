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
        public $ID;
        public $title;
        public $description;
        public $category;

        public function __construct($ID, $title, $description, $IDCategory) {
            $db = Database::GetInstance();

            $this->ID = $ID;
            $this->title = $title;
            $this->description = $description;

            $cat = $db->GetCategoryByID($IDCategory);
            if (!is_null($cat)) {
                $this->category = $cat;
            } else {
                $this->category = "Data not found";
            }
        }
    }
?>