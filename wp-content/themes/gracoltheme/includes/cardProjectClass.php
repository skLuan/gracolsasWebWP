<?php

class CardProject extends Card
{
        protected $ubicacion;
        protected $typeProject;
        protected $valorPesos;
        protected $valorSMLV;

        private $numAlcobas;
        private $MxM;
        private $description;
        public function __construct($idProject)
        {
                parent::__construct($idProject);
                $idP = $this->idProject;
                $gsBarrio = get_post_meta($idP, 'gs_barrio', true);
                $gsCiudad = get_post_meta($idP, 'gs_ciudad', true);

                $tags = get_the_terms($idP, 'tag-proyecto');

                isset($gsBarrio) && $gsBarrio == '' ? $gsBarrio = "Barrio" : '';
                isset($gsCiudad) && $gsCiudad == '' ? $gsCiudad = "Ciudad" : '';
                
                
                $this->ubicacion = [$gsBarrio, $gsCiudad];
                $this->valorPesos = get_post_meta($idP, 'gs_precio_col', true);
                $this->valorSMLV = get_post_meta($idP, 'gs_precio_SMLV', true);
                $this->description = get_the_excerpt();
        }

        public function getUbicacion()
        {
                return $this->ubicacion;
        }
        public function getValorPesos()
        {
                return $this->valorPesos;
        }
        public function getvalorSMLV()
        {
                return $this->valorSMLV;
        }
        public function getDescrition()
        {
                return $this->description;
        }
}
