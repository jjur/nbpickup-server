<?php namespace App\Filters;

use App\Models\AssignmentsModel;
use App\Models\TokensModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthAPI implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Attempt to read user authentication from HTTP Header
        $token = getBearerToken();

        if (!$token) {
            // Search for token in HTTP GET variables
            $token  = $request->getVar("token");
        }
        if ($token){
            // Validate the token
            $token_model = new TokensModel();

            $result = $token_model->find_token($token);

            if ($result){
                // Token found, lets check if it is still valid
                $created = strtotime($result["t_created_at"]);
                if ($created < time() + 25500 ){
                    // Yay token is valid lets get data about the assignment
                    $model_assignments = new AssignmentsModel();
                    $data = $model_assignments->find($result["t_assignment"]);
                    global $DATA;
                    $DATA["assignment"] = $data;

                }else{
                    // Expired
                    echo "Expired.";
                    die(410);
                }
            }else{
                // Access token not found
                echo "Token Not Recognized.";
                die(401);
            }
        }else{
            echo "Token not provided.";
            die(401);
        }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}


/**
 * Get header Authorization
 * */
function getAuthorizationHeader(){
    $headers = null;
    if (isset($_SERVER['Authorization'])) {
        $headers = trim($_SERVER["Authorization"]);
    }
    else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
        $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
    } elseif (function_exists('apache_request_headers')) {
        $requestHeaders = apache_request_headers();
        // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
        $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
        //print_r($requestHeaders);
        if (isset($requestHeaders['Authorization'])) {
            $headers = trim($requestHeaders['Authorization']);
        }
    }
    return $headers;
}
/**
 * get access token from header
 * */
function getBearerToken() {
    $headers = getAuthorizationHeader();
    // HEADER: Get the access token from the header
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}