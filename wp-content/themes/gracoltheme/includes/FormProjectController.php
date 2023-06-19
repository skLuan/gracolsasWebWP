<?php
class FormProjectController
{
    public $projectKey = '82CDRO8e0PgNCWNoE5JD8Y3/15WadCyyERqLFR6K3aHcAy-vqjbI4JFEsE25hdPG';
    // Codigo id de pagina web
    public $locationSourseId = '475d0ca1-ea2c-4a59-aa08-7324ec0376dc';
    public $body = [];
    public $APIURL = "https://api.smart-home.com.co/api/leadForm/";

    public function __construct()
    {
        $this->body = [
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => "john.doe@email.com",
            "mobile_number" => "+5733292331",
            "origin" => get_home_url(),
            "projectId" => $this->projectKey,
            "locationSourceId" => $this->locationSourseId,
            "scoring" => "20",
        ];
    }

    public function headerData(): array
    {
        $header = [
            "origin" => get_home_url(),
            "projectId" => $this->projectKey,
            "locationSourceId" => $this->locationSourseId,
        ];
        return $header;
    }
    private function jsonData()
    {
        return json_encode($this->headerData());
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
        add_action('wp_enqueue_scripts',
            $WPfn
        );
        echo 'listo el envio pr Ajax form';
    }



    public function actualizarData()
    {
    }
}
