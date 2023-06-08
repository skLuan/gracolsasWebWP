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
        private $noAlcobas;
        private $mt2;
        private $banerMobile;
        private $image_url;

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
                $this->description = wp_trim_words(get_the_excerpt(),50, '...');

                $this->noAlcobas = get_post_meta($idP, 'gs_noAlcobas', true);
                $this->mt2 = get_post_meta($idP, 'gs_mt2', true);
                $this->banerMobile = get_post_meta($idP, 'project_baner_mobile', true);
                $this->image_url = get_the_post_thumbnail_url(get_the_ID(), 'original');
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
        public function getAlcobas()
        {
                return $this->noAlcobas;
        }
        public function getMt2()
        {
                return $this->mt2;
        }
        public function getBannerMobile(){
                return $this->banerMobile;
        }
        public function getImage(){
                return $this->image_url;
        }
}
