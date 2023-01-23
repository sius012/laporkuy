namespace App\Http\Helpers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    public function safeEcho($val){
        if(isset($val)){
            return $val
        }else{
            return "";
        }
    }
}