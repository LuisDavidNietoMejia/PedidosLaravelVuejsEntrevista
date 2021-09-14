<?php  namespace PedidosLaravelVue\Http\Library;

use PedidosLaravelVue\GoogleDriveSchool;
use Illuminate\Support\Facades\Auth;

class GoogleDriveLibrary
{
    public $gClient;
    public $googleDriveSchoolModel;

    public function __construct()
    {
        $google_redirect_url = route('google.drive.oauth.login');
        $this->gClient = new \Google_Client();
        $this->gClient->setApplicationName(config('services.google_driver.app_name'));
        $this->gClient->setClientId(config('services.google_driver.client_id'));
        $this->gClient->setClientSecret(config('services.google_driver.client_secret'));
        $this->gClient->setRedirectUri($google_redirect_url);
        $this->gClient->setDeveloperKey(config('services.google_driver.api_key'));
        $this->gClient->setScopes(array(
                'https://www.googleapis.com/auth/drive.file',
                'https://www.googleapis.com/auth/drive'
            ));
        $this->gClient->setAccessType("offline");
        $this->gClient->setApprovalPrompt("force");
    }

    public function getClient()
    {
        return $this->gClient;
    }

    public function initializeServiceClient($token = null)
    {
        $service = new \Google_Service_Drive($this->gClient);
        $this->googleDriveSchoolModel = GoogleDriveSchool::where('school_id', '=', Auth::user()->school_id)->select('id', 'access_token','folder_id')->first();
        $tokenGoogle = null;

        if ($this->googleDriveSchoolModel == null) {
            $tokenGoogle = $token;
        } else {
            $tokenGoogle = $this->googleDriveSchoolModel->access_token;
        }

        $this->gClient->setAccessToken($tokenGoogle);

        if ($this->gClient->isAccessTokenExpired()) {
            // save refresh token to some variable
            $refreshTokenSaved = $this->gClient->getRefreshToken();
            // update access token
            $this->gClient->fetchAccessTokenWithRefreshToken($refreshTokenSaved);
            // // pass access token to some variable
            $updatedAccessToken = $this->gClient->getAccessToken();
            // // append refresh token
            $updatedAccessToken['refresh_token'] = $refreshTokenSaved;
            //Set the new acces token
            $this->gClient->setAccessToken($updatedAccessToken);

            if ($this->googleDriveSchoolModel != null) {
              $this->googleDriveSchoolModel->access_token = $updatedAccessToken;
              $this->googleDriveSchoolModel->save();
            }
        }
        return $service;
    }

    public function getModelGoogleDriveSchool()
    {
        return $this->googleDriveSchoolModel;
    }
}
