<?php 
    /**
     * Class Database: 
     *      this class handles interactions with the database to obtain the information required for the correct functioning of the app
     *      
     * Information needed:
     *      1- all the stories
     *      2- the information of a story
     *      3- all the chapters of a story
     *      4- all the different finals a story has
     *      5- the information of a single chapter
     *      6- all the options related to a chapter
     *      7- the last interaction made by a user with a particular a story
     *      
     * Functionalities related to the users:
     *      1- check username and password in order to access the app (login)
     *      2- check if a username is valid or already taken by another user (registration)
     *      3- save new user's information (registration)
     *      4- modify the user's updatable information such as the profile picture
     *      5- delete the user's deletable information such as the profile picture
     */

    require_once("models/Category.php");
    require_once("models/Chapter.php");
    require_once("models/Interaction.php");
    require_once("models/Option.php");
    require_once("models/Story.php");


    class Database {
        private static $instance;
        public static function GetInstance() {
            if (is_null(self::$instance)) {
                self::$instance = new Database();
            }
            return self::$instance;
        }

        private $conn;
        private function __construct() {
            $this->conn = new mysqli("localhost", "root", "", "fatebound");
        }

        //LOGIN - REGISTRATION Section
        //Login 
        public function DoLogin($username, $password) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "SELECT * FROM Users WHERE username=? AND password=?;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();

            $result = $stmt->get_result();
            if (!$result) {
                return -1;
            } else {
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    return $row["ID"];
                } else {
                    return -1;
                }
            }
        }

        //Registration 
        public function Registration($username, $password) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "INSERT INTO Users (username, password, type) VALUES (?, ?, 'user');";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();

            $result = $stmt->get_result();
            if ($result === true) {
                return $this->conn->insert_id;
            } else {
                return -1;
            }
        }

        //Check whether the username is already taken by another user 
        public function CheckUsername($username) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "SELECT * FROM Users WHERE username=?;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();

            $result = $stmt->get_result();
            if ($result === false) {
                return false;
            } else {
                return $result->num_rows == 1;
            }
        }

        //Update user's username 
        public function UpdateUsername($userId, $newUsername) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "UPDATE Users SET username=? WHERE ID=?;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("si", $newUsername, $userId);
            $stmt->execute();

            return $stmt->get_result();
        }

        //Update user's password 
        public function UpdatePassword($userId, $newPassword) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "UPDATE Users SET password=? WHERE ID=?;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("si", $newPassword, $userId);
            $stmt->execute();

            return $stmt->get_result();
        }

        //Update user's profile picture 
        public function UpdateProfilePicture($userId, $newProfilePictureName) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "UPDATE Users SET profile_picture=? WHERE ID=?;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("si", $newProfilePictureName, $userId);
            $stmt->execute();

            return $stmt->get_result();
        }

        //Update user's username 
        public function DeleteProfilePicture($userId) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "UPDATE Users SET profile_picture=NULL WHERE ID=?;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $userId);
            $stmt->execute();

            return $stmt->get_result();
        }


        //STORIES Sectionù
        //All the stories recorded
        public function GetCategoryByID($idCategory) {
            $query = "SELECT * FROM Categories WHERE ID=?;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $idCategory);
            $stmt->execute();

            $result = $stmt->get_result();
            if (!$result) {
                return null;
            } else {
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $category = new Category(
                        $row["ID"],
                        $row["name"],
                        $row["description"],
                    );

                    return $category;
                } else {
                    return null;
                }
            }
        }

        public function GetStories() {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "SELECT * FROM Stories;";
            $result = $this->conn->query($query);
            if (!$result) {
                return null;
            } else {
                if ($result->num_rows > 0) {
                    $stories = [];
                    while ($row = $result->fetch_assoc()) {
                        $story = new Story(
                            $row["ID"],
                            $row["title"],
                            $row["description"],
                            $row["category"],
                        );

                        $stories[] = $story;
                    }
                    return $stories;
                } else {
                    return null;
                }
            }
        }

        //Information of a single story
        public function GetStory($idStory) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "SELECT * FROM Stories WHERE ID=?;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $idStory);
            $stmt->execute();

            $result = $stmt->get_result();
            if (!$result) {
                return null;
            } else {
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $story = new Story(
                        $row["ID"],
                        $row["title"],
                        $row["description"],
                        $row["category"],
                    );

                    return $story;
                } else {
                    return null;
                }
            }
        }

        //All the chapters of a story
        public function GetChaptersOfStory($idStory) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "SELECT * FROM Chapters WHERE story=?;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $idStory);
            $stmt->execute();

            $result = $stmt->get_result();
            if (!$result) {
                return null;
            } else {
                if ($result->num_rows > 0) {
                    $chapters = [];
                    while ($row = $result->fetch_assoc()) {
                        $chapter = new Chapter(
                            $row["ID"],
                            $row["story"],
                            $row["title"],
                            $row["description"],
                            $row["isFinal"],
                        );

                        $chapters[] = $chapter;
                    }
                    return $chapters;
                } else {
                    return null;
                }
            }
        }

        //All the finals of a story
        public function GetNumberOfFinalOfStory($idStory) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "SELECT * FROM Chapters WHERE story=? AND isFinal=TRUE;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $idStory);
            $stmt->execute();

            $result = $stmt->get_result();
            if (!$result) {
                return null;
            } else {
                return $result->num_rows;
            }
        }

        //Information of a single chapter
        public function GetChapter($idChapter) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "SELECT * FROM Chapters WHERE ID=?;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $idChapter);
            $stmt->execute();

            $result = $stmt->get_result();
            if (!$result) {
                return null;
            } else {
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $chapter = new Chapter(
                        $row["ID"],
                        $row["story"],
                        $row["title"],
                        $row["description"],
                        $row["isFinal"],
                    );

                    return $chapter;
                } else {
                    return null;
                }
            }
        }

        //All the options of a chapter
        public function GetOptionsOfChapter($idChapter) {
            //REMEMBER: verify the type of the variable passed to the function
            $query = "SELECT * FROM Options WHERE current_chapter=?;";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $idChapter);
            $stmt->execute();

            $result = $stmt->get_result();
            if (!$result) {
                return null;
            } else {
                if ($result->num_rows > 0) {
                    $options = [];
                    while ($row = $result->fetch_assoc()) {
                        $option = new Option(
                            $row["ID"],
                            $row["description"],
                            $row["current_chapter"],
                            $row["next_chapter"],
                        );

                        $options[] = $option;
                    }
                    return $options;
                } else {
                    return null;
                }
            }
        }

        //Update the interaction made by a user with a story
        public function UpdateInteractionWithStory($idUser, $newChapterInteracted) {
            $query = "UPDATE ChaptersInteracted SET chapter=?, interaction_date=NOW() WHERE user=?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ii", $newChapterInteracted, $idUser);
            $stmt->execute();

            return $stmt->get_result();
        }

        //Last interaction made by a user with a story
        public function GetInteractionWithStory($idUser, $idStory) {
            $query = "SELECT * FROM ChaptersInteracted WHERE user=? AND chapter IN (
                SELECT * FROM Chapters WHERE story=?
            )";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ii", $idUser, $idStory);
            $stmt->execute();

            $result = $stmt->get_result();
            if (!$result) {
                return null;
            } else {
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $interaction = new Interaction(
                        $row["ID"],
                        $row["user"],
                        $row["chapter"],
                        $row["interaction_date"]
                    );

                    return $interaction;
                } else {
                    return null;
                }
            }
        }
    }
?>