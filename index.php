<?

function chargerClasse(string $classe)
{
 include $classe . '.php';   
}

//On enregistre la fonction en 
//Pour qu'elle soi appelée dès qu'on nciera une classe non déclarée.
spl_autoload_register('chargerClasse');

try {
    $db = new PDO($dsn, $user, $password);
    if ($db) {
        # code...
    }
} catch (\Throwable $th) {
    //throw $th;
}

?>