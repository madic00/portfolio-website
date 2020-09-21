<?php 

    class Project extends DbObject {
        public $idProject;
        public $title;
        public $description;
        public $liveLink;
        public $gitLink;
        public $mainImg;

        protected static $dbTable = "projects";
        protected static $idColumnName = "idProject";
        protected static $tableFields = array("title", "description", "liveLink", "gitLink", "mainImg");


    }

?>