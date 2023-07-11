<?php
class FormProjectController
{   
    //KEY del proyecto de prueba
    public $projectKey = 'ia28rR/NKN0EaJkrKl0CygwhC2TC4jAG1Zpnn6ECe0ObefG7dnJtFLpS7iZwyaMK';
    public $projectName = 'name';
    // Codigo id de pagina web
    public $locationSourseId = '475d0ca1-ea2c-4a59-aa08-7324ec0376dc';
    public $APIURL = "https://api.smart-home.com.co/api/leadForm/";

    public function __construct(string $SM_PROJECT_KEY = '')
    {
        $SM_PROJECT_KEY != ''?
        $this->projectKey = $SM_PROJECT_KEY : '';
        $this->sendtoJS();
    }

    public function headerData(): array
    {
        $header = [
            "origin" => get_home_url(),
            "nameProject" => $this->projectName,
            "SMProjectKey" => $this->projectKey,
            "locationSourceId" => $this->locationSourseId,
        ];
        return $header;
    }
    private function jsonData()
    {
        return json_encode($this->headerData());
    }

    public function setSMID($WP_ID){
        $SMID = get_post_meta($WP_ID, 'SM_ID_project', true);
        $this->projectKey = $SMID;
    }
    public function setName($WP_ID){
        $name = get_the_title($WP_ID);
        $this->projectName = $name;
    }
    
    public function sendtoJS(): void
    {
        $WPfn = function() 
        {
            wp_localize_script('formSend', 'WPheader', [
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'data' => $this->headerData(),
            ]);
        };
        add_action(
            'wp_footer',
            $WPfn
        );
    }



    public function actualizarData()
    {
    }
}
