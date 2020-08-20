<?php
class Blockchain
{
    private $db;
    public $table;
    public $tableName;
    public function __construct(PDO $db, string $tableName)
    {
        //FETCH DATA
        $statement = $db->prepare("SELECT * FROM $tableName");
        $statement->execute();
        $this->table = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->db = $db;
        $this->tableName = $tableName;

        date_default_timezone_set('UTC');
    }
    public function AddBlock(string $value)
    {
        //ADD NEW BLOCK
        $valueHashed = BlockChain::sha256($value);
        $timeStamp = date("Y-m-d H:i:s");
        $query = "INSERT INTO $this->tableName (`value`, `value_hashed`, `time_stamp`, `hash`) VALUES
        ('$value',
        '$valueHashed', 
        '$timeStamp','" .
        $this->ComputeHash($valueHashed, $timeStamp) . "')";

        $stmt = $this->db->prepare($query);
        if (!$stmt)
            die("Error preparing db");
        if (!$stmt->execute())
            die("Error quering db");
    }
    private function ComputeHash(string $valueHashed, string $timeStamp)
    {
        //FETCH LAST BLOCK
        $query = "SELECT hash FROM $this->tableName ORDER BY time_stamp DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        if (!$stmt)
            die("Error preparing db fet");
        if (!$stmt->execute())
            die("Error quering db fet");
        $row = $stmt->fetch(PDO::FETCH_UNIQUE);
        if (!$row)
            die("Eroor fetching last row");
        //HASH
        return BlockChain::sha256($valueHashed . $timeStamp . $row["hash"]);
    }
    private static function sha256($value)
    {
        return hash("sha256", $value);
    }
}