<?php
// Classe pour recueillir et traiter les données du form de contact, intégrée à Formulaire2.php

    class FormData {
       // Classe pour recueillir et traiter les données du form de contact
       
        //Attributs
        private Array $post_data;
        private Array $file_data;
        
        //Constructeur
        function __construct($post_param /*, $file_param*/){
            $this->post_data=$post_param;
           // $this->file_data=$file_param;
        }
        //Methodes
        function retournePost(){
            return $this->post_data;
        }
        
        function retourneFile(){
            return $this->file_data;
        }
        
    }
?>