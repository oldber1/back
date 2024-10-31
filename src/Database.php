namespace App;

use PDO;

class Database {
private static $instance = null;
private $connection;

private function __construct() {
$dsn = 'mysql:host=db;dbname=' . getenv('MYSQL_DATABASE');
$this->connection = new PDO($dsn, getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

public static function getInstance() {
if (self::$instance == null) {
self::$instance = new Database();
}
return self::$instance;
}

public function getConnection() {
return $this->connection;
}
}