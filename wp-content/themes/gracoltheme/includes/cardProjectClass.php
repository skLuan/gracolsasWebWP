<?php

class CardProject extends Card
{
        protected $ubicacion;
        protected $typeProject;
        protected $valorPesos;
        protected $valorSMLV;

        private string $description;
        private int $noAlcobas;
        private float $mt2;
        private string $banerMobile;
        private string $image_url;
        private string $typeIcon;
        private string $typeInmueble;
        public $tags;
        public $categories;
        public array $dinamicTags;

        public function __construct(int $idProject)
        {
                parent::__construct($idProject);
                $idP = $this->idProject;
                $gsBarrio = get_post_meta($idP, 'gs_barrio', true);
                $gsCiudad = get_post_meta($idP, 'gs_ciudad', true);

                $this->categories = $t = wp_get_post_terms($idP, 'categoria-proyecto');
                $t = array_map(function ($e) {
                        $re = [
                                'id' => $e->term_id,
                                'name' => $e->name
                        ];
                        return $re;
                }, $t);
                $this->categories = $t;
                $this->tags = $tags = get_the_terms($idP, 'tag-proyecto');
                if (!$tags && !isset($tags)) {
                        $this->typeInmueble = '';
                }
                if (count($tags) > 1) {
                        $parent_id_inmueble = 12;
                        foreach ($tags as $key => $tag) {
                                if ($tag->parent == $parent_id_inmueble) {
                                        $this->typeInmueble = $tag->name;
                                }
                        }
                }
                count($tags) >= 2 ? $this->dinamicTags = array_map(fn ($t) => $t->term_id, $tags) : $this->dinamicTags = [];

                isset($gsBarrio) && $gsBarrio == '' ? $gsBarrio = "Barrio" : '';
                isset($gsCiudad) && $gsCiudad == '' ? $gsCiudad = "Ciudad" : '';

                $this->ubicacion = [$gsBarrio, $gsCiudad];
                $this->valorPesos = get_post_meta($idP, 'gs_precio_col', true);
                $this->valorSMLV = get_post_meta($idP, 'gs_precio_SMLV', true);
                $this->description = wp_trim_words(get_the_excerpt(), 50, '...');

                $this->noAlcobas = intval(get_post_meta($idP, 'gs_noAlcobas', true));
                $this->mt2 = floatval(get_post_meta($idP, 'gs_mt2', true));
                $this->banerMobile = get_post_meta($idP, 'project_baner_mobile', true);
                $this->image_url = get_the_post_thumbnail_url(get_the_ID(), 'original');
                $this->typeIcon = match ($this->typeInmueble) {
                        'Casas' => 'clarity:house-solid',
                        default => 'material-symbols:apartment'
                };
        }
        public function getNameofTag($id)
        {
                $tagIndex = array_search($id, array_column($this->tags, 'term_id'));
                $tagName = $this->tags[$tagIndex]->name;
                return $tagName;
        }
        public function getUbicacion()
        {
                return $this->ubicacion;
        }
        public function getValorPesos()
        {
                $formattedValue = str_replace('.', '', $this->valorPesos); // Eliminar los puntos del número
                $value = floatval(str_replace(',', '.', $formattedValue)); // Reemplazar la coma decimal por un punto y convertir a float
                return number_format($value, 0, ',', '.'); // Formatear el número con puntos y comas
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
        public function getBannerMobile()
        {
                return $this->banerMobile;
        }
        public function getImage()
        {
                return $this->image_url;
        }
        public function getTypeIcon()
        {
                return $this->typeIcon;
        }
        public function getInmueble()
        {
                return $this->typeInmueble;
        }
}
